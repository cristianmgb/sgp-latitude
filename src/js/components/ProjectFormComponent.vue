<template>
	<CRow>
      	<CCol>
		    <CCard class="card-accent-dark">
		      	<CCardHeader>
		      		<i class="fas fa-plus-circle fa-lg"></i> Nuevo Proyecto
				</CCardHeader>
		      	<CCardBody class="pb-0">
		        	<ValidationObserver ref="form">
		            	<CForm @submit.prevent="onSubmit">
		            		<CRow>
								<CCol>
				            		<SgpInput
				            			id="name"
				            			label="Nombre"
				            			type="text"
				            			v-model="name"
				            			placeholder="Nombre del proyecto"
				            			rules="required|alpha_spaces"
				            		/>
				            	</CCol>
				            	<CCol>
		            				<SgpInput
										id="value"
				            			type="text"
				            			label="Valor bruto"
				            			name="Valor"
				            			placeholder="0"
				            			v-model="value"
				            			class="mb-0"
				            			rules="required|numeric"
		            				/>
		            			</CCol>
				            	<CCol>
				            		<SgpInput
				            			id="time"
				            			label="Tiempo"
				            			type="text"
				            			v-model="time"
				            			placeholder="En meses"
				            			rules="required|numeric"
				            		/>
				            	</CCol>
				            	<CCol>
				            		<div class="form-group">
									    <label for="contractIva">
									    	Valor del contrato con IVA
									    </label>
									    <input
									    	id="contractIva"
										    type="text" 
										    class="form-control" 
										    v-model="contract" 
										    disabled 
										    placeholder="0"
									    >
									</div>
				            	</CCol>
		        			</CRow>
		        			<CRow>
		            			<CCol>
		            				<SgpInput
										id="iva"
				            			label="Iva"
				            			type="text"
				            			placeholder="0"
				            			v-model="iva"
				            			rules="required|double"
		            				/>
		            				<input
		            					type="text"
		            					class="form-control mb-2"
		            					v-model="ivaValue"
		            					disabled
		            					placeholder="0"
		            				>
		            			</CCol>
		            			<CCol>
		            				<SgpInput
										id="reteiva"
				            			label="Reteiva"
				            			type="text"
				            			placeholder="0"
				            			v-model="reteiva"
				            			rules="required|double"
		            				/>
		            				<input
			            				type="text"
			            				class="form-control mb-2"
			            				v-model="reteivaValue"
			            				disabled
			            				placeholder="0"
		            				>
		            			</CCol>
		            			<CCol>
		            				<SgpInput
										id="retefuente"
				            			label="Retefuente"
				            			type="text"
				            			placeholder="0"
				            			v-model="retefuente"
				            			rules="required|double"
		            				/>
		            				<input
			            				type="text"
			            				class="form-control mb-2"
			            				v-model="retefuenteValue"
			            				disabled
			            				placeholder="0"
		            				>
		            			</CCol>
		            			<CCol>
		            				<SgpInput
										id="ica"
				            			label="Ica"
				            			type="text"
				            			placeholder="0"
				            			v-model="ica"
				            			rules="required|double"
		            				/>
		            				<input 
			            				type="text" 
			            				class="form-control mb-2" 
			            				v-model="icaValue" 
			            				disabled 
			            				placeholder="0"
		            				>
		            			</CCol>
		            			<CCol>
		            				<SgpInput
										id="estampillas"
				            			label="Estampillas"
				            			type="text"
				            			placeholder="0"
				            			v-model="estampillas"
				            			rules="required|double"
		            				/>
		            				<input 
			            				type="text" 
			            				class="form-control mb-2" 
			            				v-model="estampillasValue" 
			            				disabled 
			            				placeholder="0"
		            				>
		            			</CCol>
		            			<CCol>
		            				<div class="form-group mt-4">
									    <label for="netoClientes">Neto descuento clientes</label>
									    <input type="text" class="form-control" v-model="netoClientes" disabled placeholder="0">
									</div>
		            			</CCol>
		            		</CRow>
		            		<CRow>
		            			<CCol>
		            				<SgpInput
										id="cree"
				            			label="Cree"
				            			type="text"
				            			placeholder="0"
				            			v-model="cree"
				            			rules="required|double"
		            				/>
		            				<input 
			            				type="text" 
			            				class="form-control mb-2" 
			            				v-model="creeValue" 
			            				disabled 
			            				placeholder="0"
		            				>
		            			</CCol>
		            			<CCol>
		            				<SgpInput
										id="icaTer"
				            			label="Ica Ter."
				            			type="text"
				            			placeholder="0"
				            			v-model="icaTer"
				            			rules="required|double"
		            				/>
		            				<input 
			            				type="text" 
			            				class="form-control mb-2" 
			            				v-model="icaTerValue" 
			            				disabled 
			            				placeholder="0"
		            				>
		            			</CCol>
		            			<CCol>
		            				<SgpInput
										id="reteica"
				            			label="Reteica"
				            			type="text"
				            			placeholder="0"
				            			v-model="reteica"
				            			rules="required|double"
		            				/>
		            				<input 
			            				type="text" 
			            				class="form-control mb-2" 
			            				v-model="reteicaValue" 
			            				disabled 
			            				placeholder="0"
		            				>
		            			</CCol>
		            			<CCol>
		            				<div class="form-group mt-4">
									    <label for="netoTerceros">Neto para pagar a terceros</label>
									    <input type="text" class="form-control" v-model="netoTerceros" disabled placeholder="0">
									</div>
		            			</CCol>
		            		</CRow>
		            		<CRow>
		            			<CCol>
		            				<div class="row">
									    <label for="taxes" class="col-sm-4 col-form-label">Impuestos</label>
									    <div class="col-sm-8">
				            				<input
				            					id="taxes"
					            				type="text" 
					            				class="form-control" 
					            				v-model="taxes" 
					            				disabled 
					            				placeholder="0"
				            				>
				            			</div>
				            		</div>
		            			</CCol>
		            			<CCol>
		            				<SgpInput
				            			id="policies"
				            			label="Pólizas"
				            			type="text"
				            			v-model="policies"
				            			placeholder="0"
				            			rules="required|numeric"
				            		/>
		            			</CCol>
		            			<CCol>
		            				<SgpInput
				            			id="contractors"
				            			label="Contratistas"
				            			type="text"
				            			v-model="contractors"
				            			placeholder="0"
				            			rules="required|numeric"
				            		/>
		            			</CCol>
		            			<CCol>
		            				<CButton type="submit" class="btn btn-block btn-primary">
							            <i class="fas fa-calculator"></i> Calcular
							        </CButton>
		            			</CCol>
		            		</CRow>
							<CRow no-gutters>
								<CCol>
									<table class="table table-responsive-sm table-hover mb-0">
										<tbody>
											<tr class="bg-dark">
									    		<td class="text-left text-uppercase text-white">Subtotal</td>
									    		<td colspan="3">
									    			<CInput
													    id="subTotal"
										                class="mb-0"
										                size="sm"
										                disabled
										                placeholder="0"
										                v-model="subTotal"
										            />
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Comisión Comercial Referido</td>
									    		<td>
									    			<CInput
													    id="commission_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                placeholder="0"
										                v-model="commission_a"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="commission_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                required
										                v-model="commission_b"
										                rules="required|numeric"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="commission_c"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="commission_c"
										            />
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Apalancamiento</td>
									    		<td>
									    			<CInput
													    id="leverage_a"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="leverage_a"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="leverage_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                required
										                v-model="leverage_b"
										                rules="required|numeric"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="leverage_c"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="leverage_c"
										            />
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Obligaciones Financieras</td>
									    		<td>
									    			<CInput
													    id="obligations_a"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="obligations_a"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="obligations_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                required
										                rules="required|numeric"
										                v-model="obligations_b"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="obligations_c"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="obligations_c"
										            />
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">RSE</td>
									    		<td>
									    			<CInput
													    id="rse_a"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="rse_a"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="rse_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                required
										                rules="required|numeric"
										                v-model="rse_b"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="rse_c"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="rse_c"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-left text-uppercase text-white">Costos Externos de Latitude</td>
									    		<td colspan="3">
									    			<CInput
													    id="externalCosts"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="externalCosts"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-center text-uppercase" colspan="4">
									    			Costos Fijos Gestora
									    		</td>
									    	</tr>
									    	<tr class="text-center text-uppercase">
									    		<td>item</td>
									    		<td>valor subtotal</td>
									    		<td>%</td>
									    		<td>valor por mes</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Nómina fija</td>
									    		<td>
									    			<CInput
													    id="nomina_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="nomina_a"
										                placeholder="0"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="nomina_b"
										                class="mb-0"
										                size="sm"
										                required
										                rules="required|numeric"
										                v-model="nomina_b"
										                placeholder="0"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="nomina_c"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="nomina_c"
										                placeholder="0"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Contratistas Latitude</td>
									    		<td>
									    			<CInput
													    id="clatitude_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="clatitude_a"
										                placeholder="0"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="clatitude_b"
										                class="mb-0"
										                size="sm"
										                required
										                v-model="clatitude_b"
										                rules="required|numeric"
										                placeholder="0"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="clatitude_c"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="clatitude_c"
										                placeholder="0"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Arquitecto Ejecutivo firma</td>
									    		<td>
									    			<CInput
													    id="arquitech_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="arquitech_a"
										                placeholder="0"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="arquitech_b"
										                class="mb-0"
										                size="sm"
										                required
										                rules="required|numeric"
										                v-model="arquitech_b"
										                placeholder="0"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="arquitech_c"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="arquitech_c"
										                placeholder="0"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-left text-uppercase text-white">subtotal costos fijos latitude</td>
									    		<td>
									    			<CInput
													    id="subTotalGes_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalGes_a"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalGes_b"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalGes_b"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalGes_c"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalGes_c"
										                placeholder="0"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-center text-uppercase" colspan="4">
									    			Costos Fijos Plataforma 401
									    		</td>
									    	</tr>
									    	<tr class="text-center text-uppercase">
									    		<td>item</td>
									    		<td>valor subtotal</td>
									    		<td>%</td>
									    		<td>valor por mes</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Marca Latitude</td>
									    		<td>
									    			<CInput
													    id="brand_a"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="brand_a"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="brand_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                required
										                rules="required|numeric"
										                v-model="brand_b"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="brand_c"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="brand_c"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Equipos, Redes, Tecnologías</td>
									    		<td>
									    			<CInput
													    id="teams_a"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="teams_a"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="teams_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                required
										                rules="required|numeric"
										                v-model="teams_b"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="teams_c"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="teams_c"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Servicios Públicos y Administración</td>
									    		<td>
									    			<CInput
													    id="services_a"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="services_a"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="services_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                required
										                rules="required|numeric"
										                v-model="services_b"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="services_c"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="services_c"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-left text-uppercase text-white">subtotal costos plataforma</td>
									    		<td>
									    			<CInput
													    id="subTotalPlat_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalPlat_a"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalPlat_b"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalPlat_b"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalPlat_c"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalPlat_c"
										                placeholder="0"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-center text-uppercase" colspan="4">
									    			relaciones corporativas
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Recursos Humanos</td>
									    		<td>
									    			<CInput
													    id="resource_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="resource_b"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="resource_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                required
										                rules="required|numeric"
										                v-model="resource_b"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="resource_c"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="resource_c"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">PR y Viáticos</td>
									    		<td>
									    			<CInput
													    id="pr_a"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="pr_a"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="pr_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                required
										                rules="required|numeric"
										                v-model="pr_b"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="pr_c"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="pr_c"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr>
									    		<td class="text-right">Comunicaciones</td>
									    		<td>
									    			<CInput
													    id="common_a"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="common_a"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="common_b"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                required
										                rules="required|numeric"
										                v-model="common_b"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="common_c"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="common_c"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-left text-uppercase text-white">subtotal relaciones corporativas</td>
									    		<td>
									    			<CInput
													    id="subTotalRc_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalRc_a"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalRc_b"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalRc_b"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalRc_c"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalRc_c"
										                placeholder="0"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-left text-uppercase text-white">subtotal neto gestora</td>
									    		<td>
									    			<CInput
													    id="subTotalNg_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalNg_a"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													     id="subTotalNg_b"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalNg_b"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalNg_c"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalNg_c"
										                placeholder="0"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-center text-uppercase" colspan="4">
									    			neto operacional a ejecutar (participantes)
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-left text-uppercase text-dark">subtotal neto a ejecutar</td>
									    		<td>
									    			<CInput
													    id="subTotalNe_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalNe_a"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalNe_b"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalNe_b"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalNe_c"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalNe_c"
										                placeholder="0"
										            />
									    		</td>
									    	</tr>
									    	<tr class="text-center text-uppercase">
									    		<td>item</td>
									    		<td>valor subtotal</td>
									    		<td>%</td>
									    		<td>valor por mes</td>
									    	</tr>
									    	<tr v-for="(associate, index) in associates" :key="associate.id">
									    		<td class="text-right text-capitalize">
									    			{{ associate.first_name }} {{ associate.last_name }}
									    		</td>
									    		<td>
									    			<CInput
													    :id="`subtotal-associate-${index}`"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                :v-model="`subtotal-associate-${index}`"
										                autocomplete="off"
										            />
									    		</td>
									    		<td>
									    			<SgpInput
													    :id="`percentage-associate-${index}`"
										                class="mb-0"
										                size="sm"
										                required
										                name="%"
										                :v-model="`percentage-associate-${index}`"
										                placeholder="0"
										                autocomplete="off"
										                rules="required|double"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    :id="`value-associate-${index}`"
										                placeholder="0"
										                class="mb-0"
										                size="sm"
										                disabled
										                :v-model="getDivider( externalCosts, `subtotal-associate-${index}` )"
										                autocomplete="off"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-left text-uppercase text-white">subtotal operacional a ejecutar</td>
									    		<td>
									    			<CInput
													    id="subTotalOe_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalOe_a"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalOe_b"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalOe_b"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="subTotalOe_c"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="subTotalOe_c"
										                placeholder="0"
										            />
									    		</td>
									    	</tr>
									    	<tr class="bg-dark">
									    		<td class="text-left text-uppercase text-white">total</td>
									    		<td>
									    			<CInput
													    id="Total_a"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="Total_a"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="Total_b"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="Total_b"
										                placeholder="0"
										            />
									    		</td>
									    		<td>
									    			<CInput
													    id="Total_c"
										                class="mb-0"
										                size="sm"
										                disabled
										                v-model="Total_c"
										                placeholder="0"
										            />
									    		</td>
									    	</tr>
										</tbody>
									</table>
						        </CCol>
							</CRow>
						</CForm>
					</ValidationObserver>
				</CCardBody>
			</CCard>
      	</CCol>
	</CRow>
</template>

<script>
	import SgpInput from './SgpInput'
	import SgpInputRow from './SgpInputRow'
	import SgpInputCustom from './SgpInputCustom'
	import SgpInputInline from './SgpInputInline'
	import AlertError from './AlertError'

	export default {
		name : 'project-form',
		components: { SgpInput, SgpInputRow, SgpInputCustom, SgpInputInline, AlertError },
		data() {
      		return {
      			taxes        : '',
      			associates   : [],
      			name         : '',
		        value  		 : 0,
				time 		 : 0,
				cree  		 : 0,
				ica  		 : 0,
				icaTer		 : 0,
				reteica      : 0,
				iva          : 0,
				reteiva      : 0,
				retefuente   : 0,
				estampillas  : 0,
				contract     : 0,
				creeValue    : 0,
				icaValue     : 0,
				icaTerValue  : 0,
				reteicaValue : 0,
				netoTerceros : 0,
				ivaValue     : 0,
				reteivaValue : 0,
				retefuenteValue : 0,
				estampillasValue: 0,
				netoClientes    : 0,
				ivaResiduo   : 0,
				taxes_a      : 0,
				taxes_b      : 0,
				taxes_c      : 0,
				policies     : 0,
				contractors  : 0,
				subTotal     : 0,

				commission_a : 0,
				commission_b : 0,
				commission_c : 0,
				leverage_a   : 0,
				leverage_b   : 0,
				leverage_c   : 0,
				obligations_a: 0,
				obligations_b: 0,
				obligations_c: 0,
				rse_a		 : 0,
				rse_b		 : 0,
				rse_c		 : 0,
				externalCosts: 0,

				nomina_a     : 0,
				nomina_b     : 0,
				nomina_c     : 0,
				clatitude_a  : 0,
				clatitude_b  : 0,
				clatitude_c  : 0,
				arquitech_a  : 0,
				arquitech_b  : 0,
				arquitech_c  : 0,
				subTotalGes_a: 0,
				subTotalGes_b: 0,
				subTotalGes_c: 0,

				brand_a       : 0,
				brand_b       : 0,
				brand_c       : 0,
				teams_a       : 0,
				teams_b       : 0,
				teams_c       : 0,
				services_a    : 0,
				services_b    : 0,
				services_c    : 0,
				subTotalPlat_a: 0,
				subTotalPlat_b: 0,
				subTotalPlat_c: 0,

				resource_a  : 0,
				resource_b  : 0,
				resource_c  : 0,
				pr_a        : 0,
				pr_b        : 0,
				pr_c        : 0,
				common_a    : 0,
				common_b    : 0,
				common_c    : 0,
				subTotalRc_a: 0,
				subTotalRc_b: 0,
				subTotalRc_c: 0,
				subTotalNg_a: 0,
				subTotalNg_b: 0,
				subTotalNg_c: 0,

				subTotalNe_a: 0,
				subTotalNe_b: 0,
				subTotalNe_c: 0,
				subTotalOe_a: 0,
				subTotalOe_b: 0,
				subTotalOe_c: 0,
				Total_a     : 0,
				Total_b     : 0,
				Total_c     : 0
			}
		},
		created () {
			this.getAssociates()
		},
		methods: {
		    getValueTax( val, tax ) {
		    	let percentage = parseFloat(tax) / 100
		    	let amount     = Math.round( val * percentage )

		    	return (val) ? amount : 0;
		    },
		    getValueIca( val, tax ) {
		    	let percentage = tax / 1000
		    	let amount     = Math.round( val * percentage )

		    	return (val) ? amount : 0;
		    },
		    getFormat( val ) {
		    	return new Intl.NumberFormat().format(Math.round(val));
		    },
		    getMultiply( a, b ) {
		    	return Math.round(parseInt(a) * parseInt(b));
		    },
		    getDivider( a, b ) {
		    	return Math.round(parseInt(a) / parseInt(b));
		    },
		    getSum( a, b ) {
		    	return Math.round( parseInt(a) + parseInt(b));
		    },
		    getSumPlus( a, b, c ) {
		    	return Math.round( parseInt(a) + parseInt(b) + parseInt(c));
		    },
		    getRes( a, b ) {
		    	return Math.round( parseInt(a) - parseInt(b));
		    },
		    getAssociates () {
		    	fetch('../asociado/getAll')
				  	.then( response => response.json() )
				  	.then( result   => {
				  		this.associates = result.data
				  	}).catch( function(error) {
				  		this.$toast.error('<i class="fas fa-exclamation-triangle"></i> ' + error)
				  	})
		    },
		   	onSubmit() {
				this.$refs.form.validate().then(success => {
					if (!success) {
			          	return;
			        }

			        this.ivaValue 		  = this.getValueTax( this.value, this.iva )
			        // Desceuntos del cliente
			        this.contract 		  = this.getSum( this.value, this.ivaValue )
					this.retefuenteValue  = this.getValueTax( this.value, this.retefuente )
					this.icaValue         = this.getValueTax( this.value, this.ica )
					this.reteivaValue     = this.getValueTax( this.ivaValue, this.reteiva )
					this.estampillasValue = this.getValueTax( this.value, this.estampillas )
					this.netoClientes     = this.contract - this.retefuenteValue - this.icaValue - this.reteivaValue - this.estampillasValue

					// IvaResiduo
					this.ivaResiduo    = this.getRes( this.ivaValue, this.reteivaValue )

					// Impuestos a Terceros
			        this.creeValue     = this.getValueTax( this.value, this.cree )
					this.icaTerValue   = this.getValueIca( this.value, this.icaTer )
					this.reteicaValue  = this.getValueTax( this.icaTerValue, this.reteica )
					this.netoTerceros  = this.netoClientes - this.creeValue - this.icaTerValue - this.reteicaValue - this.ivaValue
					this.taxes 		   = this.ivaResiduo + this.reteivaValue + this.retefuenteValue + this.estampillasValue + this.creeValue + this.icaValue + this.reteicaValue + this.icaTerValue
					this.subTotal      = this.contract - this.taxes - this.policies - this.contractors

					/* ----- Section 2 ----- */
					this.commission_a  = this.getValueTax( this.subTotal, this.commission_b )
					this.commission_c  = this.getDivider( this.commission_a, this.time )
					this.leverage_a    = this.getValueTax( this.subTotal, this.leverage_b )
					this.leverage_c    = this.getDivider( this.leverage_a, this.time )
					this.obligations_a = this.getValueTax( this.subTotal, this.obligations_b )
					this.obligations_c = this.getDivider( this.obligations_a, this.time )
					this.rse_a 		   = this.getValueTax( this.subTotal, this.rse_b )
					this.rse_c 		   = this.getDivider( this.rse_a, this.time )
					this.externalCosts = this.subTotal - this.commission_a - this.leverage_a - this.obligations_a - this.rse_a

					/* ----- Section 3 ----- */
					this.nomina_a  	   = this.getValueTax( this.externalCosts, this.nomina_b )
					this.nomina_c  	   = this.getDivider( this.nomina_a, this.time )
					this.clatitude_a   = this.getValueTax( this.externalCosts, this.clatitude_b )
					this.clatitude_c   = this.getDivider( this.clatitude_a, this.time )
					this.arquitech_a   = this.getValueTax( this.externalCosts, this.arquitech_b )
					this.arquitech_c   = this.getDivider( this.arquitech_a, this.time )
					this.subTotalGes_a = this.getSumPlus( this.nomina_a, this.clatitude_a, this.arquitech_a )
					this.subTotalGes_b = this.getSumPlus( this.nomina_b, this.clatitude_b, this.arquitech_b )
					this.subTotalGes_c = this.getSumPlus( this.nomina_c, this.clatitude_c, this.arquitech_c )

					/* ----- Section 4 ----- */
					this.brand_a  	    = this.getValueTax( this.externalCosts, this.brand_b )
					this.brand_c  	    = this.getDivider( this.brand_a, this.time )
					this.teams_a        = this.getValueTax( this.externalCosts, this.teams_b )
					this.teams_c        = this.getDivider( this.teams_a, this.time )
					this.services_a     = this.getValueTax( this.externalCosts, this.teams_b )
					this.services_c     = this.getDivider( this.services_a, this.time )
					this.subTotalPlat_a = this.getSumPlus( this.brand_a, this.teams_a, this.services_a )
					this.subTotalPlat_b = this.getSumPlus( this.brand_b, this.teams_b, this.teams_b )
					this.subTotalPlat_c = this.getSumPlus( this.brand_c, this.teams_c, this.services_c )

					/* ----- Section 5 ----- */
					this.resource_a   = this.getValueTax( this.externalCosts, this.resource_b )
					this.resource_c   = this.getDivider( this.resource_a, this.time )
					this.pr_a         = this.getValueTax( this.externalCosts, this.pr_b )
					this.pr_c         = this.getDivider( this.pr_a, this.time )
					this.common_a     = this.getValueTax( this.externalCosts, this.pr_b )
					this.common_c     = this.getDivider( this.common_a, this.time )
					this.subTotalRc_a = this.getSumPlus( this.resource_a, this.pr_a, this.common_a )
					this.subTotalRc_b = this.getSumPlus( this.resource_b, this.pr_b, this.pr_b )
					this.subTotalRc_c = this.getSumPlus( this.resource_c, this.pr_c, this.common_c )
					this.subTotalNg_a = this.getSumPlus( this.subTotalRc_a, this.subTotalPlat_a, this.subTotalGes_a )
					this.subTotalNg_b = this.getSumPlus( this.subTotalRc_b, this.subTotalPlat_b, this.subTotalGes_b )
					this.subTotalNg_c = this.getSumPlus( this.subTotalRc_c, this.subTotalPlat_c, this.subTotalGes_c)

					/* ----- Section 6 ----- */
					this.subTotalNe_a = this.getRes( this.externalCosts, this.subTotalNg_a )
					this.subTotalNe_b = this.getRes( 100, this.subTotalNg_b )
					this.subTotalNe_c = this.getDivider( this.subTotalNe_a, this.time )
				});
			}
		}
	};
</script>

<style type="text/css" lang="scss">
	input::placeholder,
	.form-control, 
    .form-control:disabled {
		text-align: right;
	}

	input::-webkit-input-placeholder,
	.form-control,
	.form-control:disabled {
		text-align: right;
	}
</style>