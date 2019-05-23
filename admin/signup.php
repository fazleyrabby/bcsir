<?php
include '../header.php'; ?>
  <style>
#datepicker input:hover{cursor: pointer;}
footer {
    background-color: mintcream;
    opacity: 0.9;
    border-bottom: 1px solid #474646;
    border-top: 1px solid #474646;
    line-height: 24px;
    vertical-align: middle;
    width: 100%;
    margin-top: 30px;
}

body {
    /*background-image:  url(https://bcsir.eserve.org.bd/front-end/images/back_4.png);*/
    background-image:  url(https://bcsir.eserve.org.bd/front-end/images/back_4.png);
    background-repeat: repeat-y repeat-x;
}

h3, h4, h6{
    font-weight: bold;
}
h6{
    font-size: 14px;
}
ul{
    list-style-type: none;
}
.img-thumbnail{
    border: none;
}
.required-star:after{
    color: red;
    content: " *";
}
</style>


<div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" style="background: snow; opacity:0.7;padding:20px;margin-top: 18px; margin-bottom: 18px; border-radius:8px;">
       
            <p class="text-center" style="font-size: 20px"><strong>নিবন্ধন করুন</strong></p>
            <hr>
       
            <div class="col-md-6 col-sm-6">                               
        
                <form method="POST" action="reg.php" accept-charset="UTF-8" class="form-horizontal" id="reg_form">

                <fieldset>
                    <div class="form-group has-feedback ">
                        <label class="col-lg-4 text-left required-star">নাম </label>

                        <div class="col-lg-8">
                            <input class="form-control required" placeholder="নাম" id="name" name="name" type="text" onkeyup="check_name()" onblur="check_name()">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            <span id="alert_u"></span>
                       </div> 
                    </div>
                    <div class="form-group has-feedback ">
                        <label class="col-lg-4 text-left  member_email required-star" >ই-মেইল  </label>
                        <div class="col-lg-8">
                            <input class="form-control required" placeholder="ই-মেইল" id="email" name="email" type="email" onkeyup="checkmail()">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            <span id="alert"></span>
                        </div>
                    </div>
                       <div class="form-group has-feedback ">
                        <label class="col-lg-4 text-left required-star">পাসওয়ার্ড </label>

                        <div class="col-lg-8">
                            <input class="form-control required" placeholder="পাসওয়ার্ড" id="password" name="password" type="password">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                       </div>
                    </div>
                       <!-- <div class="form-group has-feedback ">
                        <label class="col-lg-4 text-left required-star">Re-enter Password</label>

                        <div class="col-lg-8">
                            <input class="form-control required" placeholder="Enter your Name" id="re_password" name="re_password" type="text">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                       </div>
                    </div> -->

                    <div class="form-group has-feedback ">
                    
                        <label class="col-lg-4 text-left required-star">পুনরায় পাসওয়ার্ড</label>
                        
                        <div class="col-lg-8">
                        <input name="re_password" type="password" class="form-control" placeholder="পুনরায় পাসওয়ার্ড" id="re_password" onkeyup="checkPass();" required="required"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                         <span id="confirmMessage" class="confirmMessage"></span>
                            
                            </div>
                           
                  
                    </div>
                    <!-- <div class="form-group has-feedback ">
                        <label class="col-lg-4 text-left required-star"> User Type</label>
                        <div class="col-lg-8">
                            <select class="form-control required" id="member_type" name="member_type"><option selected="selected" value="">Select One</option><option value="4">BCSIR Officials</option><option value="5">Applicant</option></select>
                                                    </div>
                    </div> -->

                    <div id="applicant-type" style="" class="form-group has-feedback ">
                        <label class="col-lg-4 text-left">আবেদনকারীর ধরণ</label>
                        <div class="col-lg-8">
                            <select class="form-control required" id="type" name="type">
                            <option value="" selected="selected">বাছাই করুন </option>
                            <option value="1">(লিমিটেড কোম্পানি)Limited Company</option>
                            <option value="2">(পার্টনারশীপ)Partnership</option>
                            <option value="3">(প্রোপার্টিশপ ) Propertieship</option>
                            <option value="4">(সরকারি ) Government</option>
                            <option value="5">(আধা সরকারি) Semi-Government</option>
                            <option value="6">(ছাত্র) Student</option>
                            <option value="7">(স্বনির্ভর) Self Employed</option>
                            <option value="8">(গ্রূপ অফ কোম্পানি ) Group of Company</option>
                            <option value="9">(এনজিও) NGO</option></select>
                        </div>
                    </div>

                    <div class="form-group has-feedback ">
                        <label class="col-lg-4 text-left">জাতীয়ও পরিচয় পত্র নং :</label>
                        <div class="col-lg-8">
                            <input class="form-control" placeholder="জাতীয়ও পরিচয় পত্র নং :" id="nid" name="nid" type="text">
                            <span class="glyphicon glyphicon-flag form-control-feedback"></span>
                    </div>
                    </div>

                    <!-- <div class="form-group has-feedback ">
                        <label class="col-lg-4 text-left"> Date of Birth </label>
                        <div class="col-lg-8">
                            <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                <input class="form-control" name="dateofbirth" type="text" readonly placeholder="Select date"/>
                                <span class="input-group-addon" style="border: none"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                       </div>
                    </div> -->

                    <div class="form-group has-feedback ">
                        <label class="col-lg-4 text-left  required-star">মোবাইল নাম্বার</label>
                        <div class="col-lg-8">
                            <input class="form-control required" placeholder="মোবাইল নাম্বার" id="phone" name="phone" type="text">
                            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label class="col-lg-4 text-left institute">শিক্ষা প্রতিষ্ঠান<span class="required_star">*</span></label>
                        <div class="col-lg-8">
                            <input class="form-control" placeholder="শিক্ষা প্রতিষ্ঠান" id="institute_name" name="institute_name" type="text" value="">
                             <b>(শুধুমাত্র ছাত্রদের জন্য)</b>
                            <span class="glyphicon glyphicon-home form-control-feedback"></span>
                                                    </div>
                    </div>

                    <fieldset id="address-view">
                        <legend style="font-size: 20px"><b>ঠিকানা</b></legend>
                        <div class="form-group has-feedback ">
                            <label class="col-lg-4 text-left">(বাড়ির নম্বর)House Number</label>
                            <div class="col-lg-8">
                                <input class="form-control" placeholder="" id="house_no" name="house_no" type="text">
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                                                            </div>
                        </div>

                        <div class="form-group has-feedback ">
                            <label class="col-lg-4 text-left"> Street Name / Village (রাস্তার নাম/গ্রাম)</label>
                            <div class="col-lg-8">
                                <input class="form-control" placeholder="" id="street" name="street" type="text">
                                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                                                            </div>
                        </div>

                        <div class="form-group has-feedback ">
                            <label class="col-lg-4 text-left">Area(এলাকা) </label>
                            <div class="col-lg-8">
                                <input class="form-control" placeholder="" id="area" name="area" type="text">
                                <span class="glyphicon glyphicon-tree-conifer form-control-feedback"></span>
                           </div>
                        </div>


                        <div class="form-group has-feedback ">
                            <label class="col-lg-4 text-left">City(শহর) </label>
                            <div class="col-lg-8">
                                <input class="form-control" placeholder="" id="city" name="city" type="text" value="">
                                <span class="glyphicon glyphicon-tower form-control-feedback"></span>
                            </div>
                        </div>

                        <div class="form-group has-feedback ">
                            <label class="col-lg-4 text-left">Zip / Post Code(পোষ্টকোড)</label>
                            <div class="col-lg-8">
                                <input class="form-control" placeholder="" id="zip" name="zip" type="text">
                                <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                                                            </div>
                        </div>

                        <div class="form-group has-feedback ">
                            <label class="col-lg-4 text-left">Fax Number (ফ্যাক্স নম্বর)</label>
                            <div class="col-lg-8">
                                <input class="form-control" placeholder="" id="fax" name="fax" type="text">
                                <span class="glyphicon glyphicon-fast-forward form-control-feedback"></span>
                         </div>
                        </div>

                    </fieldset>

                    <div class="form-group">
                        <div class="col-lg-8 col-lg-offset-2">
                            <button type="submit" class="btn btn-block btn-primary" name="submit" id="submit"><b>সাবমিট </b></button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-lg-12 col-lg-offset-2">
                            Already have an account? (ইতিমধ্যে নিবন্ধভুক্ত ?) <b><a href="index.php" class="">লগইন করুন </a></b>
                        </div>
                    </div>
                </fieldset>
        
                </form>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-6 col-sm-6" style="border-left:1px grey dotted;">
                <div id="tips">
                    <h4>সাইন-আপ সম্পর্কিত পরামর্শ</h4>
                    <hr>
                    <h6>আপনি এখানে গুগল অ্যাকাউন্টের মাধ্যমে সাইন-ইন করতে পারবেন এবং আমরা সেটারই পরামর্শ দিয়ে থাকি। </h6>
                    গুগল অ্যাকাউন্টে সাইন-আপ করার জন্য নিম্নোক্ত ধাপগুলো অনুসরণ করতে পারেন।
                    <ul>
                        <li>১. উপরে বামে লাল বাটনটিতে ক্লিক করুন।</li>
                        <li>২. যদি আপনি গুগলে সাইন-ইন করা অবস্থায় না থাকেন, তাহলে আপনাকে সাইন-ইন করে নিতে হবে।</li>
                        <li>৩. আপনি যদি ইতোমধ্যে গুগলে সাইন ইন করা অবস্থায় থাকেন, তাহলে আপনার অথ্যগুলো গুগল থেকে সরাসরি ফর্মে চলে আসবে।</li>
                        <li>৪. কোন তথ্য বাদ পড়ে গেলে সেগুলো ফর্মে যোগ করুন, এবং "নিবন্ধন" বাটনে ক্লিক করুন।</li>
                    </ul>

                    <br>
                    <h6> আপনি যদি গুগল অ্যাকাউন্ট ব্যবহার করতে না চাইলে নিম্নোক্ত ধাপগুলো অনুসরণ করে ফর্মটি পূরণ করুন।</h6>
                    <ul>
                        <li>১. প্রতিটি ঘর উপযুক্ত তথ্যসহ পূরণ করুন।</li>
                        <li>২. অনুমতি পত্রের স্ক্যান করা কপি আপলোড করুন।</li>
                        <li>৩. ছবি আপলোড করুন।</li>
                    </ul>

                    <h6>ব্যবহারকারীর ধরণ (User Type) কি হবে? </h6>
                    <ul>
                        <li>১. আপনি যদি সাধারণ ব্যবহারকারী হন, তবে আবেদনকারী (Applicant) নির্বাচন করুন।</li>
                        <li>২. যদি আপনি স্বরাষ্ট্র-মন্ত্রাণালয়ের নিজস্ব ব্যবহারকারী হন, তবে বিসিএসআইআরের  অভ্যন্তরীণ ব্যবহারকারী (BCSIR Executive) নির্বাচন করুন।</li>
                    </ul>

                    <h6> অনুমতি পত্র (Authorization Letter) কি?</h6>
                    <p>
                        আপনি যে প্রতিষ্ঠানের পক্ষে কাজ করতে চান, সেই প্রতিষ্ঠানটির ব্যবস্থাপনা পরিচালক / প্রধান ব্যক্তি কর্তৃক স্বাক্ষর সম্বলিত একটি সম্মতি পত্র,
                        যা তাদের Letter Head প্যাডে প্রিন্ট করা হয়ে থাকে।
                    </p>

                    <h6> ছবির মাপ / ধরণ কি হবে এবং কেন লাগবে?</h6>
                    <p>
                        ছবিটি আপনার প্রোফাইলে বিভিন্ন সময় ব্যবহার করা হবে এবং এটি ১৫০ x ১৭৫ পিক্সেল (পাসপোর্ট সাইজ) gif, jpg অথবা png ফরম্যাটে সর্বোচ্চ ৫০ কিলোবাইটের ভিতরে হতে হবে।
                        <br> আপনি গুগল অ্যাকাউন্ট ব্যবহার করলে আলাদা করে ছবি প্রয়োজন হবে না।
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>



<?php include '../footer.php';?>





