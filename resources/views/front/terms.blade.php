

   @extends('front.layout.app')

@section('content')
@php
    $company=App\Company::first();
@endphp
<style>
    .page-header .header-title{
        background-image:url("{{asset("faqs images.jpg")}}") ,linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));;
        background-blend-mode: overlay;
    }
</style>

     <!--Page Header-->
        <div class="page-header title-area">
            <div class="header-title">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h1 class="page-title">Terms & ConditionsS</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12 site-breadcrumb">
                            <nav class="breadcrumb">
                                <a class="home" href="#"><span>Home</span></a>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span>Terms & Conditions</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Page Header end-->

        <!--faq pagesec-->
        <section class="faqpagesec secpadd">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="#" target="_parent">
                            <h3 class="title">Terms & Conditions</h3>
                        </a>
                        <p>
                            <div class="shopify-policy__title">
                            <p><strong>IMPORTANT NOTICE TO CUSTOMERS</strong></p>
                            <p>FREIGHT 21PH CARGO FORWARDING, its officers, employees, and agents shall not assume liability for losses and damages under circumstances stated under Condition No. 9. In the event that FREIGHT 21 PH / its officers/employees/agents is/are made liable, the limit of its / their liability shall be strictly limited to the amount stated under Condition No. 6. Customers are therefore advised to purchase cover to guarantee that they are fully insured.</p>
                            <p><strong>Terms and Conditions</strong></p>
                            <p>By tendering the materials for shipment via FREIGHT 21 PH and manifested through this Waybill, the Shipper agrees to the terms and conditions stated herein. No employee or agent of FREIGHT 21 PH may alter or deviate from anything indicated and stipulated under these terms and conditions.</p>
                            <ol>
                            <li aria-level="1"><strong>CONSIGNMENT NOTE or Air Waybill:</strong> 
                                <ul><li style="list-style:none">
                                    This Waybill is NON-NEGOTIABLE and the Shipper acknowledges that it has been prepared by the Shipper or by a representative of FREIGHT 21 PH on behalf of the Shipper. The Shipper warrants that it is the owner of the goods transported or it is the authorized agent of the goods, and that it hereby accepts the terms and conditions for itself or as agent on behalf of any person having an interest in the shipment. In case of shipment under credit, an official receipt shall be issued by FREIGHT 21 PH aside from the previously issued consignment note on Waybill, upon full payment of the amount indicated therein.</li>
                                </ul></li>
                            <li aria-level="1"><strong>SHIPPER/S&rsquo; OBLIGATION AND ACKNOWLEDGEMENTS:</strong> 
                                <ul><li style="list-style:none">
                                    The Shipper warrants that each article in the shipment is properly described on this Waybill and has not been declared by FREIGHT 21 PH to be unacceptable for transport as listed under Condition No. 3, and that the shipment is properly marked, addressed, and packed to ensure safe transportation with ordinary care in handling. The Shipper hereby acknowledges that FREIGHT 21 PH may abandon and/or release any item for shipment declared unacceptable without incurring any liability whatsoever to the Shipper, and the Shipper shall not hold FREIGHT 21 PH liable for all indemnities, claims, damages, liens, and expenses arising therefrom. The Shipper shall be solely liable for all costs and expenses related to the shipment and for the cost incurred in, either returning the shipment to the Shipper or warehousing the shipment pending disposition. The Shipper acknowledges that FREIGHT 21 PH reserves the right to refuse or abandon the carriage or transportation of any goods for any person, firm, company and that FREIGHT 21 PH carries or transports any class of goods at its discretion. The Shipper acknowledges the right of FREIGHT 21 PH: (a) to dispose cargo if it remains unclaimed for forty-five (45) days from the date of its arrival at our warehouse in Luzon, Visayas, and Mindanao. FREIGHT 21 PH assumes no obligation to release the cargo unless the corresponding storage and other fees are paid, if any, to FREIGHT 21 PH. Storage charge is to be computed at Two Hundred Pesos (PHP 200.00) in excess of fifteen (15) days from the cargo&rsquo;s date of arrival in our warehouse.</li>
                                </ul></li>
                            <li aria-level="1"><strong>PROHIBITED SHIPMENT:</strong>
                                <ul><li style="list-style:none">
                                    Any prohibited drugs, narcotics, flammable items, acid chemicals, toxic liquids, dangerous articles, and all other articles prohibited for shipment or carriage as defined by Philippine laws shall not be accepted for shipment. Any corrosive material, easily breakable items, perishable goods, glass China wares, casting, goods that are brittle or fragile by nature, and all other articles of similar nature are accepted for shipment only at SHIPPER&rsquo;S / OWNER&rsquo;S RISK.&nbsp;</li>
                                </ul></li>
                            <li aria-level="1"><strong>RIGHT INSPECTION OR SHIPMENT:</strong>
                                <ul><li style="list-style:none">
                                    The Bureau of Customs (BOC) has the right, but in no way obliged, to inspect any shipment, including but not limited to, the opening of the shipment if deemed necessary. Any damages brought about by the inspections are not a liability of FREIGHT 21 PH.</li>
                                </ul></li>
                            <li aria-level="1"><strong>LIEN ON GOODS SHIPPED: </strong>
                                <ul><li style="list-style:none">
                                    FREIGHT 21 PH is shall have a lien on all goods shipped for freight charges and/or advances or other charges of any kind arising out of transportation hereunder and may refuse to surrender possession.</li>
                                </ul></li>
                            <li aria-level="1"><strong>LIMITATION OF LIABILITY: </strong>
                            <ul><li style="list-style:none">
                                Without prejudice to Condition No. 8, the liability of FREIGHT 21 PH for any loss or damage to the shipment, which term shall include all documents or parcels to be delivered by FREIGHT 21 PH under this Waybill, is limited to the following, whichever is the least:</li>
                                
                            <ol>
                            <li aria-level="2">The amount of loss or damage to a document or parcel, actually sustained,&nbsp;</li>
                            <li aria-level="2">The actual value of the document as determined under Condition No. 7 hereof, without regard to each commercial utility or special value to the Shipper</li>
                            <li aria-level="2">The declared value by the Shipper as stipulated verbally</li>
                            <li aria-level="2">The total freight costs incurred from China to the Philippines</li>
                            </ol></ul>
                            </li>
                            
                          
                            <li aria-level="1"><strong>ACTUAL VALUE:</strong></li>
                       
                            
                            
                            <ol>
                            <li aria-level="2">The actual value of a document (which term includes any item of no commercial value) which is transported hereunder shall be ascertained by reference to its cost preparation, replacement, reconstruction or reconstitution at the time and place of shipment, whichever is less.</li>
                            <li aria-level="2">The actual value of a parcel (which term shall include anything of commercial value) which is transported hereunder shall be ascertained by reference to its cost of repair and replacement, resale at fair market value at the time and place of shipment, whichever is less. In no event shall such value exceed the original cost of the article paid by the Shipper.</li>
                            </ol>
                            
                            
                            
                            <li aria-level="1"><strong>CONSEQUENTIAL DAMAGES EXCLUDED:</strong></li>
                             <ul><li style="list-style:none">
                                 FREIGHT 21 PH shall not be liable in any event for any consequential or special damages or other indirection, however arising, whether or not FREIGHT 21 PH had knowledge that such damages might be incurred, including but not limited to, loss of income, profits, interest, utility or loss of market.</li>
                            </ul>
                           
                           
                            <li aria-level="1"><strong>LIABILITIES NOT ASSUMED:</strong></li>
                             <ul><li style="list-style:none">
                                While FREIGHT 21 PH will endeavor to exercise its best effort to provide expeditious delivery in accordance with regular delivery schedules, FREIGHT 21 PH will not under any circumstances be liable for delay in pick-up, transportation, or delivery of any shipment, regardless of the cause of such delay. Further, FREIGHT 21 PH shall not be liable for any loss, damage, mistaken delivery, or non-delivery due to the following:</li>
                            </ul>
                          
                            <ol>
                            <li aria-level="2">Due to acts of God, fortuitous event, force majeure, or any cause or reason beyond the control of FREIGHT 21 PH; or</li>
                            
                            <li aria-level="2">Caused by:</li>
                            <ul>
                            <li>(b.1) The act of default or omission of the Shipper, the consigning, or any other party who claims an interest, including violation of any term or condition hereof or of any person other than FREIGHT 21 PH regardless of whether the Shipper requested or had acknowledged such third-party delivery arrangement.</li>
                            <li>(b.2) The act of default or omission of the Shipper due to non-compliance with the Shipment I.D. that should be written on all the parcels.</li>
                            <li>(b.3) Non-compliance of the Shipper to adhere to the proper packaging guidelines as outlined in Appendix I.</li>
                            </ul>
                            </ol>
                           
                            
                           
                            <li aria-level="1"><strong>CLAIMS:</strong></li>
                           
                            <ol>
                            <li aria-level="2">Any claim must be notified to FREIGHT 21 PH within twenty-four (24) hours from the time of acceptance and must be brought by the Shipper and presented in writing to the office of FREIGHT 21 PH at North Fairview, Quezon City. Claims made beyond the 7-day period from the time of acceptance of shipment by the Shipper may no longer be entertained.</li>
                            
                            <li aria-level="2">No claim for loss or damage will be entertained until all transportation charges have been paid. The amount of any such claim may not be deducted from any transportation or freight charges due to FREIGHT 21 PH.</li>
                            
                            <li aria-level="2">If the shipment shows signs of tampering at the time of delivery to consignee, any claim for loss or damage of any document may not be entertained and considered valid unless the consignee notes the said loss or damage on the Proof of Delivery or Carrier&rsquo;s Duplicate Copy.</li>
                            </ol>
                              
                            <li aria-level="1"><strong>APPLICABILITY:</strong></li>
                         
                               <ul><li style="list-style:none">
                                    Terms and conditions shall inure to the benefit of FREIGHT 21 PH and its authorized agents and affiliated companies, their officers, directors, and employees.
                            
                                </li></ul>
                               
                            <li aria-level="1"><strong>GOVERNING LAW AND VENUE:</strong></li>
                                <ul><li style="list-style:none">
                                    This Agreement shall be governed by and construed in accordance with the laws of the Philippines, without regard to any conflict of laws.
                            
                                </li></ul>
                            
                           
                            <li><strong> OTHER WARRANTIES BY THE SHIPPER:</strong></li>
                            
                            <ul>
                                <li>(a) That the shipper has communicated/will communicate with the consignee/owner regarding the shipment; </li>
                                <li>(b) That the consignee/owner shall pay in case the mode of payment is Cash on Delivery (COD), regardless of whether or not the consignee/owner was actually informed of the charges by the shipper or by FREIGHT 21 PH; and </li>
                                <li>(c) That the shipper shall pay the charges if the
                                </li>
                             </ul>
                            <li style="list-style:none">consignee/owner does not pay in case of COD, regardless of whether or not the consignee/owner was actually informed of the charges by the shipper or by FREIGHT 21 PH.</li>
                            </ol>
                        </p>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--faqpagesec end-->
        
        
@endsection