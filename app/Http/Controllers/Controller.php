<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Company;
use App\Order;
use App\OrderDetail;
use App\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function combinations($arrays) {
        $result = array(array());
        foreach ($arrays as $property => $property_values) {
            $tmp = array();
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
    }

   

    public function forget($customer)
    {
        $company=Company::get()->first();
       
        $to = $customer->email;
        $from  = $company->email;
        
        $subject = "Forget Password Email";
        $message = "<!DOCTYPE html>
        <html lang='en'>
        
        <head>
        
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
        
        </head>
        
        <body>
        
            <div class='container body'>
                Dear Sir/Madam,<br>
                Your Credentials for $company->name are,
                <br>
                Email: $customer->email<br>
                Password: $customer->pin 
        
            </div>
        
        </body>
        
        </html>
        ";
    
        $headers = "From: $from";
        // boundary
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
        // Additional headers
        $headers .= "To: $to, .";
    
    
        $ok = @mail($to, $subject, $message, $headers, "-f " . $from);
        return $ok;
    }

    public function quote_email($email,$invoice)
    {
        $company=Company::get()->first();
       
        $to = $email;
        // $from  = $company->email;
        $from="Freight21PH@freight21ph.com";
        
        
        $transit="background-color:black";
        $customs="background-color:black";
        $warehouse="background-color:black";
        $package="background-color:black";
        $created="background-color:black";
        $start_message="";
        $end_message="";
        if($invoice->status=="In Transit"){
            $transit="background-color:#ba372a";
            $subject = "Your Items is IN TRANSIT for Shipping ID:".$invoice->invoice_no;
            $start_message='
            <p>
            Mabuhay Ka-Freight!<br><br>
            Hi Ma`am/Sir '.$invoice->first_name.' <br><br>
            This is it pansit! We are glad to inform you that your package are now IN TRANSIT.<br><br>
            Your cargo have been loaded to cargo ship and currently on its way to Manila Port.<br><br>
            </p>
            ';
            
            $end_message='
                Until our next email update!<br>
            ';
        }
        else if($invoice->status=="At Customs"){
            $customs="background-color:#ba372a";
            $subject = "Your Items is in MANILA CUSTOMS for Shipping ID:".$invoice->invoice_no;
            $start_message='
            <p>
            Mabuhay Ka-Freight!<br><br>
            Hi Ma`am/Sir '.$invoice->first_name.' <br><br>
            Please be informed  that your cargo shipment are already AT CUSTOMS!<br><br>
            This is up for customs inspections and may take a few more days.<br><br>

            </p>
            ';
            
            $end_message='
              
            ';
        }
        else if($invoice->status=="In Warehouse"){
            $warehouse="background-color:#ba372a";
            $subject = "Your Items is IN OUR WAREHOUSE for Shipping ID:".$invoice->invoice_no;
            $start_message='
            <p>
            Mabuhay Ka-Freight!<br><br>
            Hi Ma`am/Sir '.$invoice->first_name.' <br><br>
            We are delighted to inform you that your cargo are already IN WAREHOUSE and ready for PICK UP!<br><br>

            </p>
            ';
            
            $end_message='
              WE WILL SEND YOUR STATEMENT OF ACCOUNT IN SEPARATE EMAIL.

            ';
        }
        else if($invoice->status=="Booking Created"){
            $created="background-color:#ba372a";
            $subject = "Booking Created for Shipping ID:".$invoice->invoice_no;
            $start_message='
            <p>
            Mabuhay Ka-Freight!<br><br>
            Hi Ma`am/Sir '.$invoice->first_name.' <br><br>
            Congratulations! You already booked your shipment with us.<br><br>
            Be reminded to inform your China supplier for your SHIPMENT ID and ask them to put it on your order`s packaging as shipping mark.<br><br>
            Just keep your SHIPMENT ID as your reference code, it can be used for tracking your shipment in our website.<br><br>
            Please have patience to wait for your cargo`s arrival.<br>
            Just relax and enjoy the process.<br><br><br>
            </p>
            ';
            
            $end_message='
            
            "He that can have patience can have what he will" - Benjamin Franklin			
								<br><br>
            ';
        }
        else{
            $package="background-color:#ba372a";
             $subject = "Package Received at China Warehouse for Shipping ID:".$invoice->invoice_no;
        }
        $message = $start_message.'<br><br>
        
        <!DOCTYPE HTML
          PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
              xmlns:o="urn:schemas-microsoft-com:office:office">
            
            <head>
              <!--[if gte mso 9]>
            <xml>
              <o:OfficeDocumentSettings>
                <o:AllowPNG/>
                <o:PixelsPerInch>96</o:PixelsPerInch>
              </o:OfficeDocumentSettings>
            </xml>
            <![endif]-->
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta name="x-apple-disable-message-reformatting">
              <!--[if !mso]><!-->
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <!--<![endif]-->
              <title></title>
            
              <style type="text/css">
                table,
                td {
                  color: #000000;
                }
            
                a {
                  color: #0000ee;
                  text-decoration: underline;
                }
            
                @media (max-width: 480px) {
                  #u_content_image_1 .v-text-align {
                    text-align: center !important;
                  }
            
                  #u_content_heading_1 .v-font-size {
                    font-size: 24px !important;
                  }
            
                  #u_content_button_4 .v-padding {
                    padding: 15px !important;
                  }
            
                  #u_content_heading_3 .v-font-size {
                    font-size: 16px !important;
                  }
            
                  #u_column_4 .v-col-padding {
                    padding: 0px !important;
                  }
            
                  #u_content_heading_4 .v-font-size {
                    font-size: 16px !important;
                  }
            
                  #u_content_image_2 .v-src-width {
                    width: 120px !important;
                  }
            
                  #u_content_image_2 .v-src-max-width {
                    max-width: 20% !important;
                  }
            
                  #u_content_image_2 .v-text-align {
                    text-align: center !important;
                  }
            
                  #u_content_heading_5 .v-font-size {
                    font-size: 18px !important;
                  }
            
                  #u_content_heading_5 .v-text-align {
                    text-align: center !important;
                  }
            
                  #u_content_image_4 .v-src-width {
                    width: 120px !important;
                  }
            
                  #u_content_image_4 .v-src-max-width {
                    max-width: 20% !important;
                  }
            
                  #u_content_image_4 .v-text-align {
                    text-align: center !important;
                  }
            
                  #u_content_heading_7 .v-font-size {
                    font-size: 18px !important;
                  }
            
                  #u_content_heading_7 .v-text-align {
                    text-align: center !important;
                  }
            
                  #u_content_image_5 .v-src-width {
                    width: 120px !important;
                  }
            
                  #u_content_image_5 .v-src-max-width {
                    max-width: 20% !important;
                  }
            
                  #u_content_image_5 .v-text-align {
                    text-align: center !important;
                  }
            
                  #u_content_heading_8 .v-font-size {
                    font-size: 18px !important;
                  }
            
                  #u_content_heading_8 .v-text-align {
                    text-align: center !important;
                  }
            
                  #u_content_image_3 .v-src-width {
                    width: 120px !important;
                  }
            
                  #u_content_image_3 .v-src-max-width {
                    max-width: 20% !important;
                  }
            
                  #u_content_image_3 .v-text-align {
                    text-align: center !important;
                  }
            
                  #u_content_heading_6 .v-font-size {
                    font-size: 18px !important;
                  }
            
                  #u_content_heading_6 .v-text-align {
                    text-align: center !important;
                  }
                }
            
                @media only screen and (min-width: 620px) {
                  .u-row {
                    width: 600px !important;
                  }
            
                  .u-row .u-col {
                    vertical-align: top;
                  }
            
                  .u-row .u-col-33p33 {
                    width: 199.98px !important;
                  }
            
                  .u-row .u-col-50 {
                    width: 300px !important;
                  }
            
                  .u-row .u-col-66p67 {
                    width: 400.02px !important;
                  }
            
                  .u-row .u-col-100 {
                    width: 600px !important;
                  }
            
                }
            
                @media (max-width: 620px) {
                  .u-row-container {
                    max-width: 100% !important;
                    padding-left: 0px !important;
                    padding-right: 0px !important;
                  }
            
                  .u-row .u-col {
                    min-width: 320px !important;
                    max-width: 100% !important;
                    display: block !important;
                  }
            
                  .u-row {
                    width: calc(100% - 40px) !important;
                  }
            
                  .u-col {
                    width: 100% !important;
                  }
            
                  .u-col>div {
                    margin: 0 auto;
                  }
                }
            
                body {
                  margin: 0;
                  padding: 0;
                }
            
                table,
                tr,
                td {
                  vertical-align: top;
                  border-collapse: collapse;
                }
            
                p {
                  margin: 0;
                }
            
                .ie-container table,
                .mso-container table {
                  table-layout: fixed;
                }
            
                * {
                  line-height: inherit;
                }
            
                a[x-apple-data-detectors="true"] {
                  color: inherit !important;
                  text-decoration: none !important;
                }
              </style>
            
            
            
            </head>
            
            <body class="clean-body"
              style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #ffffff;color: #000000">
              <!--[if IE]><div class="ie-container"><![endif]-->
              <!--[if mso]><div class="mso-container"><![endif]-->
              <table
                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #ffffff;width:100%"
                cellpadding="0" cellspacing="0">
                <tbody>
                  <tr style="vertical-align: top">
                    <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                      <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #ffffff;"><![endif]-->
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="600" class="v-col-padding" style="background-color: #ba372a;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-100"
                              style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #ba372a;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_image_1" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                    cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px 10px 10px 20px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                              <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="center">
            
                                                <img align="center" border="0" src="https://freight21ph.com/public/email/image-8.png" alt="Logo" title="Logo"
                                                  style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 61%;max-width: 347.7px;"
                                                  width="347.7" class="v-src-width v-src-max-width" />
            
                                              </td>
                                            </tr>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0a81ab;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #0a81ab;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="600" class="v-col-padding" style="background-color: #ba372a;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-100"
                              style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #ba372a;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_heading_1" style="font-family:arial,helvetica,sans-serif;"
                                    role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <h2 class="v-text-align v-font-size"
                                            style="margin: 0px; color: #e4f9f5; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: arial black,avant garde,arial; font-size: 20px;">
                                            
                                          </h2>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <table id="u_content_button_4" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                    cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <div class="v-text-align" align="center">
                                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;font-family:arial,helvetica,sans-serif;"><tr><td class="v-text-align" style="font-family:arial,helvetica,sans-serif;" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://unlayer.com/" style="height:83px; v-text-anchor:middle; width:268px;" arcsize="60%" strokecolor="#e4f9f5" strokeweight="4px" fillcolor="#000000"><w:anchorlock/><center style="color:#FFFFFF;font-family:arial,helvetica,sans-serif;"><![endif]-->
                                            <a href="https://unlayer.com/" target="_blank"
                                              style="box-sizing: border-box;display: inline-block;font-family:arial,helvetica,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #000000; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;border-top-color: #e4f9f5; border-top-style: solid; border-top-width: 4px; border-left-color: #e4f9f5; border-left-style: solid; border-left-width: 4px; border-right-color: #e4f9f5; border-right-style: solid; border-right-width: 4px; border-bottom-color: #e4f9f5; border-bottom-style: solid; border-bottom-width: 4px;">
                                              <span class="v-padding" style="display:block;padding:20px;line-height:120%;font-size: 36px;"><span
                                                  style="font-size: 36px; line-height: 43.2px; font-family: "arial black", "avant garde", arial;">'.$invoice->status.'</span></span>
                                            </a>
                                            <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
                                          </div>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <table id="u_content_heading_3" style="font-family:arial,helvetica,sans-serif;"
                                    role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <h4 class="v-text-align v-font-size"
                                            style="margin: 0px; color: #e4f9f5; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: arial black,avant garde,arial; font-size: 16px;">
                                            Shipment ID: '.$invoice->invoice_no.'
                                          </h4>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0c4271;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #0c4271;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="600" class="v-col-padding" style="background-color: #000000;width: 600px;padding: 0px 0px 0px 10px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div id="u_column_4" class="u-col u-col-100"
                              style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #000000;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px 0px 0px 10px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_heading_4" style="font-family:arial,helvetica,sans-serif;"
                                    role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <h3 class="v-text-align v-font-size"
                                            style="margin: 0px; color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 18px;">
                                            Thank you for Patiently waiting, we will like to update you with your booking status
                                            that is
                                          </h3>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: #ffffff">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #000000;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #000000;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="200" class="v-col-padding" style="background-color: #000000;width: 200px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-33p33"
                              style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #000000;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_image_2" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                    cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                              <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="right">
            
                                                <img align="right" border="0" src="https://freight21ph.com/public/email/image-11.png" alt="Verify" title="Verify"
                                                  style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 30%;max-width: 60px;"
                                                  width="60" class="v-src-width v-src-max-width" />
            
                                              </td>
                                            </tr>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]><td align="center" width="400" class="v-col-padding" style="background-color: #000000;width: 400px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-66p67"
                              style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                              <div style="'.$created.';width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_heading_5" style="font-family:arial,helvetica,sans-serif;"
                                    role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 10px 20px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <h1 class="v-text-align v-font-size"
                                            style="margin: 0px; color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 20px;">
                                            Booking Created
                                          </h1>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
                            <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0c4271;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #0c4271;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="600" class="v-col-padding" style="background-color: #000000;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-100"
                              style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #000000;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                    cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                            style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #e03e2d;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <tbody>
                                              <tr style="vertical-align: top">
                                                <td
                                                  style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                  <span>&#160;</span>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>

                      <div class="u-row-container" style="padding: 0px;background-color: #ffffff">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #000000;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #000000;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="200" class="v-col-padding" style="background-color: #000000;width: 200px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-33p33"
                              style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #000000;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_image_2" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                    cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                              <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="right">
            
                                                <img align="right" border="0" src="https://freight21ph.com/public/email/image-7.png" alt="Verify" title="Verify"
                                                  style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 30%;max-width: 60px;"
                                                  width="60" class="v-src-width v-src-max-width" />
            
                                              </td>
                                            </tr>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            
                        
                            
                            
                            <!--[if (mso)|(IE)]><td align="center" width="400" class="v-col-padding" style="background-color: #000000;width: 400px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-66p67"
                              style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                              <div style="'.$package.';width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_heading_5" style="font-family:arial,helvetica,sans-serif;"
                                    role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 10px 20px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <h1 class="v-text-align v-font-size"
                                            style="margin: 0px; color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 20px;">
                                            Package Received
                                          </h1>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            

            
            
                      <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0c4271;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #0c4271;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="600" class="v-col-padding" style="background-color: #000000;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-100"
                              style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #000000;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                    cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                            style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #e03e2d;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <tbody>
                                              <tr style="vertical-align: top">
                                                <td
                                                  style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                  <span>&#160;</span>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: #ffffff">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #000000;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #000000;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="200" class="v-col-padding" style="background-color: #000000;width: 200px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-33p33"
                              style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #000000;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_image_4" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                    cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                              <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="right">
            
                                                <img align="right" border="0" src="https://freight21ph.com/public/email/image-4.png" alt="Upload" title="Upload"
                                                  style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 30%;max-width: 60px;"
                                                  width="60" class="v-src-width v-src-max-width" />
            
                                              </td>
                                            </tr>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]><td align="center" width="400" class="v-col-padding" style="background-color: #000000;width: 400px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-66p67"
                              style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                              <div style="'.$transit.';width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_heading_7" style="font-family:arial,helvetica,sans-serif;"
                                    role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 10px 20px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <h1 class="v-text-align v-font-size"
                                            style="margin: 0px; color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 20px;">
                                            In Transit
                                          </h1>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0c4271;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #0c4271;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="600" class="v-col-padding" style="background-color: #0a0a0a;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-100"
                              style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #0a0a0a;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                    cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                            style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #e03e2d;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <tbody>
                                              <tr style="vertical-align: top">
                                                <td
                                                  style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                  <span>&#160;</span>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: #ffffff">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ba372a;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: #ffffff;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ba372a;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="200" class="v-col-padding" style="background-color: #000000;width: 200px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-33p33"
                              style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #000000;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_image_5" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                    cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                              <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="right">
            
                                                <img align="right" border="0" src="https://freight21ph.com/public/email/image-6.png" alt="Folder" title="Folder"
                                                  style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 30%;max-width: 60px;"
                                                  width="60" class="v-src-width v-src-max-width" />
            
                                              </td>
                                            </tr>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]><td align="center" width="400" class="v-col-padding" style="background-color: #ba372a;width: 400px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-66p67"
                              style="background-color:black;max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                              <div style="'.$customs.';width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_heading_8" style="font-family:arial,helvetica,sans-serif;"
                                    role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 10px 20px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <h1 class="v-text-align v-font-size"
                                            style="margin: 0px; color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 20px;">
                                            At Manila Customs
                                          </h1>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0c4271;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #0c4271;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="600" class="v-col-padding" style="background-color: #000000;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-100"
                              style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #000000;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                    cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                            style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #e03e2d;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <tbody>
                                              <tr style="vertical-align: top">
                                                <td
                                                  style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                  <span>&#160;</span>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #000000;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #000000;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="200" class="v-col-padding" style="background-color: #000000;width: 200px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-33p33"
                              style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #000000;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_image_3" style="font-family:arial,helvetica,sans-serif;" role="presentation"
                                    cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                              <td class="v-text-align" style="padding-right: 0px;padding-left: 0px;" align="right">
            
                                                <img align="right" border="0" src="https://freight21ph.com/public/email/image-9.png" alt="Invite" title="Invite"
                                                  style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 30%;max-width: 60px;"
                                                  width="60" class="v-src-width v-src-max-width" />
            
                                              </td>
                                            </tr>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]><td align="center" width="400" class="v-col-padding" style="width: 400px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-66p67"
                              style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">
                              <div style="'.$warehouse.';width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table id="u_content_heading_6" style="font-family:arial,helvetica,sans-serif;"
                                    role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:15px 10px 10px 20px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <h1 class="v-text-align v-font-size"
                                            style="margin: 0px; color: #ffffff; line-height: 140%; text-align: left; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 20px;">
                                            In Warehouse
                                          </h1>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #0c4271;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #0c4271;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="600" class="v-col-padding" style="background-color: #000000;width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-100"
                              style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #000000;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                    cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                            style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #e03e2d;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                            <tbody>
                                              <tr style="vertical-align: top">
                                                <td
                                                  style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                  <span>&#160;</span>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
            
                      <div class="u-row-container" style="padding: 0px;background-color: transparent">
                        <div class="u-row"
                          style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #e03e2d;">
                          <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #e03e2d;"><![endif]-->
            
                            <!--[if (mso)|(IE)]><td align="center" width="300" class="v-col-padding" style="background-color: #ba372a;width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-50"
                              style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #ba372a;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                    cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <div class="v-text-align"
                                            style="color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;">
                                            <p style="font-size: 14px; line-height: 140%;">Lot No. 28 National Highway Brgy. Garlang
                                              San Ildefonso Bulacan</p>
                                          </div>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                    cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <div class="v-text-align"
                                            style="color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;">
                                            <p style="font-size: 14px; line-height: 140%;">Call: +02-8355-2006</p>
                                            <p style="font-size: 14px; line-height: 140%;">Email: info@freight21ph.com</p>
                                          </div>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]><td align="center" width="300" class="v-col-padding" style="background-color: #e03e2d;width: 300px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->
                            <div class="u-col u-col-50"
                              style="max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;">
                              <div style="background-color: #e03e2d;width: 100% !important;">
                                <!--[if (!mso)&(!IE)]><!-->
                                <div class="v-col-padding"
                                  style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                  <!--<![endif]-->
            
                                  <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                    cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <div align="center">
                                            <div style="display: table; max-width:167px;">
                                              <!--[if (mso)|(IE)]><table width="167" cellpadding="0" cellspacing="0" border="0"><tr><td style="border-collapse:collapse;" align="center"><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse; mso-table-lspace: 0pt;mso-table-rspace: 0pt; width:167px;"><tr><![endif]-->
            
            
                                              <!--[if (mso)|(IE)]><td width="32" style="width:32px; padding-right: 10px;" valign="top"><![endif]-->
                                              <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32"
                                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 10px">
                                                <tbody>
                                                  <tr style="vertical-align: top">
                                                    <td align="left" valign="middle"
                                                      style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                      <a href="https://www.facebook.com/freight21PH" title="Facebook"
                                                        target="_blank">
                                                        <img src="https://freight21ph.com/public/email/image-1.png" alt="Facebook" title="Facebook" width="32"
                                                          style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                      </a>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                              <!--[if (mso)|(IE)]></td><![endif]-->
            
                                              <!--[if (mso)|(IE)]><td width="32" style="width:32px; padding-right: 10px;" valign="top"><![endif]-->
                                              <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32"
                                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 10px">
                                                <tbody>
                                                  <tr style="vertical-align: top">
                                                    <td align="left" valign="middle"
                                                      style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                      <a href="https://www.twitter.com/freight21PH" title="Twitter" target="_blank">
                                                        <img src="https://freight21ph.com/public/email/image-2.png" alt="Twitter" title="Twitter" width="32"
                                                          style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                      </a>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                              <!--[if (mso)|(IE)]></td><![endif]-->
            
                                              <!--[if (mso)|(IE)]><td width="32" style="width:32px; padding-right: 10px;" valign="top"><![endif]-->
                                              <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32"
                                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 10px">
                                                <tbody>
                                                  <tr style="vertical-align: top">
                                                    <td align="left" valign="middle"
                                                      style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                      <a href="https://www.linkedin.com/in/freight21ph-20381021a" title="LinkedIn" target="_blank">
                                                        <img src="https://freight21ph.com/public/email/image-5.png" alt="LinkedIn" title="LinkedIn" width="32"
                                                          style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                      </a>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                              <!--[if (mso)|(IE)]></td><![endif]-->
            
                                              <!--[if (mso)|(IE)]><td width="32" style="width:32px; padding-right: 0px;" valign="top"><![endif]-->
                                              <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32"
                                                style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 0px">
                                                <tbody>
                                                  <tr style="vertical-align: top">
                                                    <td align="left" valign="middle"
                                                      style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                      <a href="https://www.instagram.com/freight21PH" title="Instagram"
                                                        target="_blank">
                                                        <img src="https://freight21ph.com/public/email/image-3.png" alt="Instagram" title="Instagram" width="32"
                                                          style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                      </a>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                              <!--[if (mso)|(IE)]></td><![endif]-->
            
            
                                              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                                            </div>
                                          </div>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <table style="font-family:arial,helvetica,sans-serif;" role="presentation" cellpadding="0"
                                    cellspacing="0" width="100%" border="0">
                                    <tbody>
                                      <tr>
                                        <td
                                          style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:arial,helvetica,sans-serif;"
                                          align="left">
            
                                          <div class="v-text-align"
                                            style="color: #ffffff; line-height: 140%; text-align: center; word-wrap: break-word;">
                                            <p style="font-size: 14px; line-height: 140%;">Need help figuring out where to start?
                                            </p>
                                          </div>
            
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <!--[if (!mso)&(!IE)]><!-->
                                </div>
                                <!--<![endif]-->
                              </div>
                            </div>
                            <!--[if (mso)|(IE)]></td><![endif]-->
                            <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                          </div>
                        </div>
                      </div>
            
            
                      <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </td>
                  </tr>
                </tbody>
              </table>
              <!--[if mso]></div><![endif]-->
              <!--[if IE]></div><![endif]-->
            </body>
            
            </html>
            <br>
            '.$end_message.'
        <br>
        You can always visit our website for more information, <a href="https://freight21ph.com/faq">click here</a> to know more!		
								<br><br>
Busy? No one are available to pick up your cargo?					<br>
Don`t worry we got you! Just <a href="https://freight21ph.com/services">click here</a> for DOOR-TO-DOOR DELIVERY and you will received your cargo in you doorsteps!
								<br><br>
Want to deliver your items upon arrival in the Philippines to several customers? Don`t have enough space for your products?<br>
Freight21 PH are offering FULFILLMENT and WAREHOUSE services! Just <a href="https://freight21ph.com/services">click here</a> to learn more!	<br><br>
								<br>
								
								
Thank you very much,<br>							
FREIGHT 21 PH TEAM	<br>						
<img src="https://freight21ph.com/public/email/1_MAIN.png" style="height:100px;width:100px;">
        ';
    
        $headers = "From: Freight 21 PH<Freight21PH@freight21ph.com>";
        // boundary
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
        // Additional headers
        $headers .= "To: $to, .";
    
      
        $ok = @mail($to, $subject, $message, $headers, "-f".$from);
      
        return $ok;
    }
}
