<?php defined('SYSPATH') or die('No direct access allowed.');

return array(
		'orderdatatemplate' => '<ClinicalDocument>
									<code codeSystemName="LOINC"/>
									<confidentialityCode code="N"/>
									<languageCode code="en-US"/>
									<recordTarget>
											<patientRole>
													<id value="$iohid" />
													<addr >
															<streetAddressLine>$patientaddress</streetAddressLine>
															<city>$patientcity</city>
															<state>$patientstate</state>
															<postalCode>$patientpostalcode</postalCode>
															<country>$patientcountry</country>
													</addr>
													<telecom value="$telephone"/>
													<mobilenumber value="$mobilenumber" />
													<patient>
															<name use="L">
																	<given>$name</given>
																	<family>$lastname</family>
															</name>
															<administrativeGenderCode code="$gendercode" />
															<birthTime value="$dob"/>
															<age>
																$age
															</age>
															<agetype>
																$type
															</agetype>
															<birthplace>
																	<place>
																			<addr>
																					<state>$birthstate</state>
																					<postalCode>$birthpostalcode</postalCode>
																					<country>$birthcountry</country>
																			</addr>
																	</place>
															</birthplace>
													</patient>
											</patientRole>
									</recordTarget>
									<inFulfillmentOf>
											<orderinfo>
												<referringdoctor>
													$referringdoctor
												</referringdoctor>
												<campname>
													$campname
												</campname>
												<medicalhistory>
													$medicalhistory
												</medicalhistory>
												<status>
													<code></code>
													<info></info>
												</status>
											</orderinfo>
											<order>
													<id value="$ordernumber" />
													<testcode>
														$testcode
													</testcode>
													<testname>
														$testname
													</testname>
													<sellingprice>
														$sellingprice
													</sellingprice>
											</order>
									</inFulfillmentOf>
							</ClinicalDocument>
							'

);