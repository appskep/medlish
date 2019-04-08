<?php

namespace backend\helpers;

use yii\helpers\Url;

class ReportHelper
{
	public static function months() {
		return [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];
	}
	
	public static function header($params = []) {
		
		switch ($params['view']) {
			case 'incoming':
				$return = '
					<table class="table-report-header" width="100%">
						<tr>
							<td rowspan="2">
								<h4 style="margin:0;"><b>INDAH MOTOR</b>
									<small> - ' . $params['title'] . '</small>
								</h4>
							</td>
							<td style="width:1px; padding:0 20px">Periode</td>
							'. ($params['supplier_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Distributor</td>' : '' ) . '
						</tr>
						<tr>
							<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['date_start'] ? ($params['date_start'] == $params['date_end'] ? $params['date_start'] : $params['date_start'] . ' - ' . $params['date_end']) : '<span class="text-muted">(semua)</span>') . '</b></td>
							'. ($params['supplier_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['supplier_id'] ? $params['models'][0]->supplier->name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
						</tr>
					</table>
				';
				break;
			case 'incoming-item':
				$return = '
					<table class="table-report-header" width="100%">
						<tr>
							<td rowspan="2">
								<h4 style="margin:0;"><b>INDAH MOTOR</b>
									<small> - ' . $params['title'] . '</small>
								</h4>
							</td>
							<td style="width:1px; padding:0 20px">Periode</td>
							'. ($params['supplier_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Distributor</td>' : '' ) . '
						</tr>
						<tr>
							<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['date_start'] ? ($params['date_start'] == $params['date_end'] ? $params['date_start'] : $params['date_start'] . ' - ' . $params['date_end']) : '<span class="text-muted">(semua)</span>') . '</b></td>
							'. ($params['supplier_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['supplier_id'] ? $params['models'][0]->incoming->supplier->name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
						</tr>
					</table>
				';
				break;

			case 'outgoing':
				$return = '
					<table class="table-report-header" width="100%">
						<tr>
							<td rowspan="2">
								<h4 style="margin:0;"><b>INDAH MOTOR</b>
									<small> - ' . $params['title'] . '</small>
								</h4>
							</td>
							<td style="width:1px; padding:0 20px">Periode</td>
							'. ($params['salesman_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Salesman</td>' : '' ) . '
							'. ($params['customer_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Pelanggan</td>' : '' ) . '
						</tr>
						<tr>
							<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['date_start'] ? ($params['date_start'] == $params['date_end'] ? $params['date_start'] : $params['date_start'] . ' - ' . $params['date_end']) : '<span class="text-muted">(semua)</span>') . '</b></td>
							'. ($params['salesman_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['salesman_id'] ? $params['models'][0]->salesman->name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
							'. ($params['customer_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['customer_id'] ? $params['models'][0]->customer->name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
						</tr>
					</table>
				';
				break;
				
			case 'outgoing-item':
				$return = '
					<table class="table-report-header" width="100%">
						<tr>
							<td rowspan="2">
								<h4 style="margin:0;"><b>INDAH MOTOR</b>
									<small> - ' . $params['title'] . '</small>
								</h4>
							</td>
							<td style="width:1px; padding:0 20px">Periode</td>
							'. ($params['salesman_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Salesman</td>' : '' ) . '
							'. ($params['customer_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Pelanggan</td>' : '' ) . '
						</tr>
						<tr>
							<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['date_start'] ? ($params['date_start'] == $params['date_end'] ? $params['date_start'] : $params['date_start'] . ' - ' . $params['date_end']) : '<span class="text-muted">(semua)</span>') . '</b></td>
							'. ($params['salesman_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['salesman_id'] ? $params['models'][0]->outgoing->salesman->name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
							'. ($params['customer_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['customer_id'] ? $params['models'][0]->outgoing->customer->name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
						</tr>
					</table>
				';
				break;

			case 'payment':
				$return = '
					<table class="table-report-header" width="100%">
						<tr>
							<td rowspan="2">
								<h4 style="margin:0;"><b>INDAH MOTOR</b>
									<small> - ' . $params['title'] . '</small>
								</h4>
							</td>
							<td style="width:1px; padding:0 20px">Periode</td>
							'. ($params['customer_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Pelanggan</td>' : '' ) . '
						</tr>
						<tr>
							<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['date_start'] ? ($params['date_start'] == $params['date_end'] ? $params['date_start'] : $params['date_start'] . ' - ' . $params['date_end']) : '<span class="text-muted">(semua)</span>') . '</b></td>
							'. ($params['customer_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['customer_id'] ? $params['models'][0]->customer->name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
						</tr>
					</table>
				';
				break;

			case 'debt':
				$return = '
					<table class="table-report-header" width="100%">
						<tr>
							<td rowspan="2">
								<h4 style="margin:0;"><b>INDAH MOTOR</b>
									<small> - ' . $params['title'] . '</small>
								</h4>
							</td>
							'. ($params['salesman_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Salesman</td>' : '' ) . '
						</tr>
						<tr>
							'. ($params['salesman_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['salesman_id'] ? $params['models'][0]->salesman->name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
						</tr>
					</table>
				';
				break;

			case 'debt-history':
				$return = '
					<table class="table-report-header" width="100%">
						<tr>
							<td rowspan="2">
								<h4 style="margin:0;"><b>INDAH MOTOR</b>
									<small> - ' . $params['title'] . '</small>
								</h4>
							</td>
							'. ($params['customer_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Pelanggan</td>' : '' ) . '
						</tr>
						<tr>
							'. ($params['customer_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['customer_id'] ? $params['models'][0]->customer->name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
						</tr>
					</table>
				';
				break;

			case 'print':
				$return = '
					<table class="table-report-header" width="100%">
						<tr>
							<td width="35%"><big><b>IM ' . $params['model']->idText . '</b> <br> ' . strtoupper(date('d F Y', strtotime($params['model']->date))) . '</big></td>
							<td width="30%" class="text-center"><big><big><b>FAKTUR</b></big></big></td>
							<td width="35%" class="text-right"><big><b>' . $params['model']->customer->name . '</b></big> <br> ' . $params['model']->customer->address . '</td>
						</tr>
					</table>
				';
				break;

			case 'print-resume':
				$return = '<br>
					<table class="table-report-header" width="100%">
						<tr>
							<td rowspan="2" width="50%">
								<h4 style="margin:0;">INDAH MOTOR
									<small> - ' . $params['title'] . '</small>
								</h4>
							</td>
							<td style="width:1px; padding:0 20px; white-space:nowrap"> </td>
							'. ($params['customer_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; ; white-space:nowrap"> </td>' : '' ) . '
						</tr>
						<tr>
							<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['date_start'] ? ($params['date_start'] == $params['date_end'] ? $params['date_start'] : $params['date_start'] . ' - ' . $params['date_end']) : '<span class="text-muted">(semua)</span>') . '</b></td>
							'. ($params['customer_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b><big>' . ($params['customer_id'] ? $params['models'][0]->customer->name : '<span class="text-muted">(semua)</span>') . '</big></b></td>' : '' ) . '
						</tr>
					</table>
				';
				break;

			case 'order-to-supplier':
				$return = '
					<table class="table-report-header" width="100%">
						<tr>
							<td rowspan="2">
								<h4 style="margin:0;"><b>INDAH MOTOR</b>
									<small style="display:none"> - ' . $params['title'] . '</small>
								</h4>
							</td>
							<td style="width:1px; padding:0 20px">Periode</td>
							'. ($params['supplier_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px"> </td>' : '' ) . '
							'. ($params['customer_name'] && $params['models'] ? '<td style="width:1px; padding:0 20px"> </td>' : '' ) . '
							'. ($params['brand_supplier'] && $params['models'] ? '<td style="width:1px; padding:0 20px"> </td>' : '' ) . '
						</tr>
						<tr>
							<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['date_start'] ? ($params['date_start'] == $params['date_end'] ? $params['date_start'] : $params['date_start'] . ' - ' . $params['date_end']) : '<span class="text-muted">(semua)</span>') . '</b></td>
							'. ($params['supplier_id'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['supplier_id'] ? $params['models'][0]->supplier->name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
							'. ($params['customer_name'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['customer_name'] ? $params['models'][0]->order->customer_name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
							'. ($params['brand_supplier'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['brand_supplier'] ? $params['models'][0]->brand_supplier : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
						</tr>
					</table>
				';
				break;

			case 'order-to-storage':
				$return = '
					<table class="table-report-header" width="100%">
						<tr>
							<td rowspan="2">
								<h4 style="margin:0;"><b>INDAH MOTOR</b>
									<small> - ' . $params['title'] . '</small>
								</h4>
							</td>
							<td style="width:1px; padding:0 20px">Periode</td>
							'. ($params['customer_name'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Pelanggan</td>' : '' ) . '
							'. ($params['brand_storage'] && $params['models'] ? '<td style="width:1px; padding:0 20px">Merk</td>' : '' ) . '
						</tr>
						<tr>
							<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['date_start'] ? ($params['date_start'] == $params['date_end'] ? $params['date_start'] : $params['date_start'] . ' - ' . $params['date_end']) : '<span class="text-muted">(semua)</span>') . '</b></td>
							'. ($params['customer_name'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['customer_name'] ? $params['models'][0]->order->customer_name : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
							'. ($params['brand_storage'] && $params['models'] ? '<td style="width:1px; padding:0 20px; white-space:nowrap"><b>' . ($params['brand_storage'] ? $params['models'][0]->brand_storage : '<span class="text-muted">(semua)</span>') . '</b></td>' : '' ) . '
						</tr>
					</table>
				';
				break;
			
			default:
				$return = null;
				break;
		}	

		

		return $return;
	}

	public static function footer($to_pdf = false) {
		$fontSize 	= $to_pdf ? 'font-size:11px' : '';

		return;
	}
}
