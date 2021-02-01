<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Taxes extends Seeder
{
	public function run()
	{
		$data = [
			[
				'name' => 'Iva',
				'description' => 'El IVA o Impuesto sobre el Valor Añadido es un impuesto indirecto que grava el consumo doméstico final de productos y servicios producidos tanto en el territorio nacional como en el exterior.',
				'value' => 19,
				'state' => 1
			],
	        [
	        	'name' => 'Reteiva',
	        	'description' => 'El impuesto a la ventas puede ser recaudado de forma anticipada mediante el mecanismo de retención en la fuente de acuerdo a lo señalado por el artículo 437-1 del estatuto tributario, modificado por la ley 2010 de 2019',
	        	'value' => 15,
	        	'state' => 1
	        ],
	        [
	        	'name' => 'Retefuente',
	        	'description' => 'La retención en la fuente es una forma de recaudar anticipadamente el impuesto de la renta, el cual, el Estado cobra anualmente.',
	        	'value' => 11,
	        	'state' => 1
	        ],
	        [
	        	'name' => 'Ica',
	        	'description' => 'es el Impuesto de Industria y Comercio el cual se genera por la realización de actividades industriales de forma directa o indirecta, comerciales o de servicios',
	        	'value' => 12,
	        	'state' => 1
	        ],
	        [
	        	'name' => 'Reteica',
	        	'description' => 'un mecanismo de recaudo anticipado establecido en cada municipio, mediante el cual las personas responsable del impuesto de industria y comercio (ICA) debe efectuar la retención de todos los pagos o abonos en cuenta por la compra de bienes y servicios que están sometidos al ICA',
	        	'value' => 12,
	        	'state' => 1
	        ],
	        [
	        	'name' => 'Estampilla',
	        	'description' => 'Son tributos dentro de la especie de “tasas parafiscales”, en la medida en que participan de la naturaleza de las contribuciones parafiscales, pues constituyen un gravamen cuyo pago obligatorio deben realizar los usuarios de algunas operaciones o actividades que se realizan frente a organismos de carácter público',
	        	'value' => 7,
	        	'state' => 1
	        ],
	        [
	        	'name' => 'Cree',
	        	'description' => 'es un tributo de destinación específica para la financiación de programas de inversión social, en beneficio de la población más necesitada, que es usuaria del SENA y del ICBF.',
	        	'value' => 8,
	        	'state' => 1
	        ]
	    ];
	    
	    foreach ($data as $value) {
       		$this->db->table('sgp_taxes')->insert($value);
	    }
	}
}
