<?php defined('SYSPATH') or die('No direct access allowed.');

return array(
		"individualorder" =>array(
		"variables" => array("pid","pstreetaddress","pcity","pstate","pstate","orderid","pcountry","ptelecom","pmobileno","salutation","firstname","middlename","familyname","gendercode","netamount","birthtime","birthyears","birthmonths","birthdays","tests","ppin","grossamount","discountamount","discountpercentage","reasonfordiscount"),
		"template" => '
				<individualorder><patientRole>
							<id>$pid</id>
							<addr >
								<streetAddressLine>$pstreetaddress</streetAddressLine>
								<city>$pcity</city>
								<state>$pstate</state>
								<postalCode>$ppin</postalCode>
								<country>$pcountry</country>
							</addr>
							<telecom >$ptelecom</telecom>
							<mobilenumber>$pmobileno</mobilenumber>
							<patient>
								<name>
									<salutation>$salutation</salutation>
									<firstname>$firstname</firstname>
									<middlename>$middlename</middlename>
									<family>$familyname</family>
								</name>
								<uid/>
								<administrativeGenderCode>$gendercode</administrativeGenderCode>
								<birthTime>$birthtime</birthTime>
								<age>
									<years>$birthyears</years>
									<months>$birthmonths</months>
									<days>$birthdays</days>
								</age>
								<birthplace>
									<place>
										<addr>
											<state></state>
											<postalCode></postalCode>
											<country></country>
											</addr>
									</place>
								</birthplace>
							</patient>
						</patientRole>
						<orderinfo>
							<id>$orderid</id>
							<grossamount>$grossamount</grossamount>
							<discountamount>$discountamount</discountamount>
							<discountpercentage>$discountpercentage</discountpercentage>
							<reasonfordiscount>$reasonfordiscount</reasonfordiscount>
							<netamount>$netamount</netamount>
							<referringdoctor></referringdoctor>
							<uid/>
							<referringdoctorcontact></referringdoctorcontact>
							<ordertype>catalog</ordertype>
							<medicalhistory>-</medicalhistory>
						</orderinfo>
						<tests>$tests</tests>
					</individualorder>
				
       '
	),
	"bulkorder" =>array(
		"variables" => array("bulkorderid","pid","pstreetaddress","pcity","pstate","pstate","orderid","pcountry","ptelecom","pmobileno","salutation","firstname","middlename","familyname","gendercode","netamount","birthtime","birthyears","birthmonths","birthdays","tests","ppin"),
		"template" => '
				<bulkorders><individualorder>
						<bulkorderid>$bulkorderid</bulkorderid>
						<patientRole>
							<id>$pid</id>
							<addr >
								<streetAddressLine>$pstreetaddress</streetAddressLine>
								<city>$pcity</city>
								<state>$pstate</state>
								<postalCode>$ppin</postalCode>
								<country>$pcountry</country>
							</addr>
							<telecom >$ptelecom</telecom>
							<mobilenumber>$pmobileno</mobilenumber>
							<patient>
								<name>
									<salutation>$salutation</salutation>
									<firstname>$firstname</firstname>
									<middlename>$middlename</middlename>
									<family>$familyname</family>
								</name>
								<administrativeGenderCode>$gendercode</administrativeGenderCode>
								<birthTime>$birthtime</birthTime>
								<age>
									<years>$birthyears</years>
									<months>$birthmonths</months>
									<days>$birthdays</days>
								</age>
								<birthplace>
									<place>
										<addr>
											<state></state>
											<postalCode></postalCode>
											<country></country>
											</addr>
									</place>
								</birthplace>
							</patient>
						</patientRole>
						<orderinfo>
							<id>$orderid</id>
							<grossamount>$netamount</grossamount>
							<discountamount>0</discountamount>
							<discountpercentage>0</discountpercentage>
							<reasonfordiscount>NA</reasonfordiscount>
							<netamount>$netamount</netamount>
							<referringdoctor>-</referringdoctor>
							<referringdoctorcontact>-</referringdoctorcontact>
							<ordertype>catalog</ordertype>
							<medicalhistory>-</medicalhistory>
						</orderinfo>
						<tests>$tests</tests>
					</individualorder>
				</bulkorders>
       '
	),
	"tests" =>array(
		"variables" => array("loinc","labtestcode","iohtestcode","labtestname","labstdprice"),
		"template" => '<test>
				<loinc>$loinc</loinc>
				<labtestcode>$labtestcode</labtestcode>
				<iohtestcode>$iohtestcode</iohtestcode>
				<labtestname>$labtestname</labtestname>
				<labstdprice>$labstdprice</labstdprice>
			</test>
       '
	),
	"ack_res" =>array(
		"variables" => array("id","type","details","statuscode"),
		"template" => '<order><statuscode>$statuscode</statuscode><details>$details</details><id>$id</id><type>$type</type></order>'
	),
	"error" =>array(
		"variables" => array("level","code","column","message","line"),
		"template" => '<error><level>$level</level><code>$code</code><column>column</column><message>$message</message><line>$line</line></error>'
	)
);