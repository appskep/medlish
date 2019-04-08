<?php

namespace backend\controllers;

use Datetime;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use backend\models\Incoming;
use backend\models\IncomingItem;
use backend\models\Outgoing;
use backend\models\OutgoingItem;
use backend\models\Payment;
use backend\models\Customer;
use backend\models\DebtHistory;
use backend\models\StockHistory;

/**
 * LogController implements the CRUD actions for Log model.
 */
class ReportController extends Controller
{
    public function generatePdf($title, $view, $params = [], $landscape = false) {
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => 'A4',
            'orientation' => $landscape ? 'L' : 'P',
            'marginTop' => '22',
            'marginBottom' => '10',
            'marginLeft' => '5',
            'marginRight' => '5',
            'filename' => $title,
            'options' => ['title' => $title],
            'content' => $this->renderPartial($view, $params),
            'methods' => [
                'SetHeader' => \backend\helpers\ReportHelper::header($params),
                'SetFooter' => ['Print date: ' . date('d/m/Y') . '||Page {PAGENO} of {nbpg}'],
            ],
            'cssInline' => '
                body, .printable, .table-report { font-size: 10pt }
                .table-report { margin-bottom:10px }
                .table-report td { border-bottom:1px solid #ccc; vertical-align:top; padding:0px 10px }
                .table-report tr.thead td { vertical-align:bottom; padding:2px 5px }
                .table-report tr.thead td { font-weight: bold; text-transform: uppercase; border-bottom:2px solid #ccc; border-top:none }
                thead { display: table-header-group }
                .table-report-footer td { border:none; padding:0px 5px }
            ',
        ]);
        return $pdf->render();
    }

    public function actionIncoming($date_start = '', $date_end = '', $supplier_id = '', $to_pdf = 0)
    {
        if ($date_start == '')  $date_start = date('d/m/Y', strtotime('-6 days'));
        if ($date_end == '')    $date_end   = date('d/m/Y');

        $date_start_object  = Datetime::createFromFormat('d/m/Y', $date_start);
        $date_end_object    = Datetime::createFromFormat('d/m/Y', $date_end);
        $from               = $date_start_object->format('Y-m-d');
        $to                 = $date_end_object->format('Y-m-d');

        $query = Incoming::find();
        $query->where(['between', 'date', $from, $to]);
        if ($supplier_id) $query->andWhere(['supplier_id' => $supplier_id]);
        $query->orderBy(['id' => SORT_DESC]);
        $models = $query->all();

        $title  = 'LAPORAN PEMBELIAN';
        $view   = 'incoming';

        $pre_params = [
            'models'        => $models, 
            'date_start'    => $date_start,
            'date_end'      => $date_end,
            'supplier_id'   => $supplier_id,
            'title'         => $title,
            'view'          => $view,
            'to_pdf'        => $to_pdf,
        ];
        $params = array_merge($pre_params, ['params' => $pre_params]);

        if ($to_pdf)
        return $this->generatePdf($title, $view, $params, 0);

        return $this->render($view, $params);
    }



    public function actionIncomingItem($date_start = '', $date_end = '', $supplier_id = '', $item_id = '', $to_pdf = 0)
    {
        if ($date_start == '')  $date_start = date('d/m/Y', strtotime('-6 days'));
        if ($date_end == '')    $date_end   = date('d/m/Y');

        $date_start_object  = Datetime::createFromFormat('d/m/Y', $date_start);
        $date_end_object    = Datetime::createFromFormat('d/m/Y', $date_end);
        $from               = $date_start_object->format('Y-m-d');
        $to                 = $date_end_object->format('Y-m-d');

        $query = IncomingItem::find();
        $query->joinWith(['incoming']);
        $query->where(['between', 'date', $from, $to]);
        if ($supplier_id) $query->andWhere(['supplier_id' => $supplier_id]);
        if ($item_id) $query->andWhere(['item_id' => $item_id]);
        $query->orderBy([
            'incoming_id' => SORT_DESC,
            'id' => SORT_DESC,
        ]);
        $models = $query->all();

        $title  = 'LAPORAN PEMBELIAN ITEM';
        $view   = 'incoming-item';
        $pre_params = [
            'models'        => $models, 
            'date_start'    => $date_start,
            'date_end'      => $date_end,
            'supplier_id'   => $supplier_id,
            'item_id'       => $item_id,
            'title'         => $title,
            'view'          => $view,
            'to_pdf'        => $to_pdf,
        ];
        $params = array_merge($pre_params, ['params' => $pre_params]);

        if ($to_pdf)
        return $this->generatePdf($title, $view, $params, 1);

        return $this->render($view, $params);
    }

    public function actionOutgoing($date_start = '', $date_end = '', $salesman_id = '', $customer_id = '', $with_profit = 0, $to_pdf = 0)
    {
        if ($date_start == '')  $date_start = date('d/m/Y', strtotime('-6 days'));
        if ($date_end == '')    $date_end   = date('d/m/Y');

        $date_start_object  = Datetime::createFromFormat('d/m/Y', $date_start);
        $date_end_object    = Datetime::createFromFormat('d/m/Y', $date_end);
        $from               = $date_start_object->format('Y-m-d');
        $to                 = $date_end_object->format('Y-m-d');

        $query = Outgoing::find();
        $query->where(['between', 'date', $from, $to]);
        if ($salesman_id) $query->andWhere(['salesman_id' => $salesman_id]);
        if ($customer_id) $query->andWhere(['customer_id' => $customer_id]);
        $query->orderBy(['id' => SORT_DESC]);
        $models = $query->all();

        $title  = 'LAPORAN PENJUALAN';
        $view   = 'outgoing';

        $pre_params = [
            'models'        => $models, 
            'date_start'    => $date_start,
            'date_end'      => $date_end,
            'salesman_id'   => $salesman_id,
            'customer_id'   => $customer_id,
            'with_profit'   => $with_profit,
            'title'         => $title,
            'view'          => $view,
            'to_pdf'        => $to_pdf,
        ];
        $params = array_merge($pre_params, ['params' => $pre_params]);

        if ($to_pdf)
        return $this->generatePdf($title, $view, $params, 0);

        return $this->render($view, $params);
    }



    public function actionOutgoingItem($date_start = '', $date_end = '', $salesman_id = '', $customer_id = '', $item_id = '', $with_profit = 0, $to_pdf = 0)
    {
        if ($date_start == '')  $date_start = date('d/m/Y', strtotime('-6 days'));
        if ($date_end == '')    $date_end   = date('d/m/Y');

        $date_start_object  = Datetime::createFromFormat('d/m/Y', $date_start);
        $date_end_object    = Datetime::createFromFormat('d/m/Y', $date_end);
        $from               = $date_start_object->format('Y-m-d');
        $to                 = $date_end_object->format('Y-m-d');

        $query = OutgoingItem::find();
        $query->joinWith(['outgoing']);
        $query->where(['between', 'date', $from, $to]);
        if ($salesman_id) $query->andWhere(['salesman_id' => $salesman_id]);
        if ($customer_id) $query->andWhere(['customer_id' => $customer_id]);
        if ($item_id) $query->andWhere(['item_id' => $item_id]);
        $query->orderBy([
            'serial' => SORT_DESC,
            'outgoing_id' => SORT_DESC,
            'id' => SORT_DESC,
        ]);
        $models = $query->all();

        $title  = 'LAPORAN PENJUALAN ITEM';
        $view   = 'outgoing-item';
        $pre_params = [
            'models'        => $models, 
            'date_start'    => $date_start,
            'date_end'      => $date_end,
            'salesman_id'   => $salesman_id,
            'customer_id'   => $customer_id,
            'item_id'       => $item_id,
            'with_profit'   => $with_profit,
            'title'         => $title,
            'view'          => $view,
            'to_pdf'        => $to_pdf,
        ];
        $params = array_merge($pre_params, ['params' => $pre_params]);

        if ($to_pdf)
        return $this->generatePdf($title, $view, $params, 1);

        return $this->render($view, $params);
    }

    public function actionPayment($date_start = '', $date_end = '', $customer_id = '', $to_pdf = 0)
    {
        if ($date_start == '')  $date_start = date('d/m/Y', strtotime('-6 days'));
        if ($date_end == '')    $date_end   = date('d/m/Y');

        $date_start_object  = Datetime::createFromFormat('d/m/Y', $date_start);
        $date_end_object    = Datetime::createFromFormat('d/m/Y', $date_end);
        $from               = $date_start_object->format('Y-m-d');
        $to                 = $date_end_object->format('Y-m-d');

        $query = Payment::find();
        $query->where(['between', 'date', $from, $to]);
        if ($customer_id) $query->andWhere(['customer_id' => $customer_id]);
        $query->orderBy(['id' => SORT_DESC]);
        $models = $query->all();

        $title  = 'LAPORAN PEMBAYARAN';
        $view   = 'payment';

        $pre_params = [
            'models'        => $models, 
            'date_start'    => $date_start,
            'date_end'      => $date_end,
            'customer_id'   => $customer_id,
            'title'         => $title,
            'view'          => $view,
            'to_pdf'        => $to_pdf,
        ];
        $params = array_merge($pre_params, ['params' => $pre_params]);

        if ($to_pdf)
        return $this->generatePdf($title, $view, $params, 0);

        return $this->render($view, $params);
    }

    public function actionDebt($salesman_id = '', $hide_zero = 0, $to_pdf = 0)
    {
        $query = Customer::find();
        if ($salesman_id) $query->andWhere(['salesman_id' => $salesman_id]);
        $query->orderBy(['name' => SORT_ASC]);
        $models = $query->all();

        $title  = 'LAPORAN PIUTANG';
        $view   = 'debt';

        $pre_params = [
            'models'        => $models,
            'salesman_id'   => $salesman_id,
            'hide_zero'     => $hide_zero,
            'title'         => $title,
            'view'          => $view,
            'to_pdf'        => $to_pdf,
        ];
        $params = array_merge($pre_params, ['params' => $pre_params]);

        if ($to_pdf)
        return $this->generatePdf($title, $view, $params, 0);

        return $this->render($view, $params);
    }

    public function actionDebtHistory($date_start = '', $date_end = '', $customer_id = '', $to_pdf = 0)
    {
        if ($date_start == '')  $date_start = date('d/m/Y', strtotime('-6 days'));
        if ($date_end == '')    $date_end   = date('d/m/Y');

        $date_start_object  = Datetime::createFromFormat('d/m/Y', $date_start);
        $date_end_object    = Datetime::createFromFormat('d/m/Y', $date_end);
        $from               = $date_start_object->format('Y-m-d');
        $to                 = $date_end_object->format('Y-m-d');

        $query = DebtHistory::find();
        $query->where(['between', 'date', $from, $to]);
        $query->andWhere(['customer_id' => $customer_id]);
        $query->orderBy(['date' => SORT_ASC]);
        $models = $query->all();

        $title  = 'LAPORAN HISTORY PIUTANG PER PELANGGAN';
        $view   = 'debt-history';

        $pre_params = [
            'models'        => $models, 
            'date_start'    => $date_start,
            'date_end'      => $date_end,
            'customer_id'   => $customer_id,
            'title'         => $title,
            'view'          => $view,
            'to_pdf'        => $to_pdf,
        ];
        $params = array_merge($pre_params, ['params' => $pre_params]);

        if ($to_pdf)
        return $this->generatePdf($title, $view, $params, 0);

        return $this->render($view, $params);
    }

    public function actionStockHistory($date_start = '', $date_end = '', $item_id = '', $to_pdf = 0)
    {
        if ($date_start == '')  $date_start = date('d/m/Y', strtotime('-6 days'));
        if ($date_end == '')    $date_end   = date('d/m/Y');

        $date_start_object  = Datetime::createFromFormat('d/m/Y', $date_start);
        $date_end_object    = Datetime::createFromFormat('d/m/Y', $date_end);
        $from               = $date_start_object->format('Y-m-d');
        $to                 = $date_end_object->format('Y-m-d');

        $query = StockHistory::find();
        $query->where(['between', 'date', $from, $to]);
        $query->andWhere(['item_id' => $item_id]);
        $query->orderBy(['date' => SORT_ASC]);
        $models = $query->all();

        $title  = 'LAPORAN HISTORY STOK PER BARANG';
        $view   = 'stock-history';

        $pre_params = [
            'models'        => $models, 
            'date_start'    => $date_start,
            'date_end'      => $date_end,
            'item_id'       => $item_id,
            'title'         => $title,
            'view'          => $view,
            'to_pdf'        => $to_pdf,
        ];
        $params = array_merge($pre_params, ['params' => $pre_params]);

        if ($to_pdf)
        return $this->generatePdf($title, $view, $params, 0);

        return $this->render($view, $params);
    }
}
