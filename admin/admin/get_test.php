<?php
include'../connect/config.php'; 
$q = intval($_GET['q']);

$sql="SELECT * FROM bcsir_lab_test WHERE lab_test_id = '".$q."'";
$sqlp=mysqli_query($conn,$sql);
if($sqlp==true)
{
$sqlob=mysqli_fetch_object($sqlp);
$price=$sqlob->lab_test_price;
?>
<p>সেন্ড মানি সেবার মাধ্যমে আপনি আপনার বিকাশ একাউন্ট থেকে আরেকটি বিকাশ একাউন্টে টাকা পাঠাতে পারেন যেকোন সময়। সেন্ড মানি করতে নিচের ধাপগুলো অনুসরণ করুন-</p>

<p>১। *২৪৭# ডায়াল করে বিকাশ মোবাইল মেন্যুতে যান</p>

<p>২। “সেন্ড মানি” সিলেক্ট করুন</p>

<p>৩। আপনি যে বিকাশ একাউন্টে টাকা পাঠাতে চান সেই একাউন্ট নাম্বারটি লিখুন</p>

<p>৪। আপনি যে পরিমাণ টাকা <?php echo $price?> টি লিখুন</p>

<p>৫। লেনদেনের একটি রেফারেন্স/তথ্যসূত্র দিন (একটি শব্দের বেশি ব্যবহার করবেন না, স্পেস এবং বিশেষ অক্ষর এর ব্যবহার এড়িয়ে চলুন)</p>

<p>৬। আপনার বিকাশ মোবাইল মেন্যু পিনটি দিয়ে লেনদেনটি সম্পন্ন করুন</p>

<p>আপনি এবং প্রাপক দুজনই বিকাশ থেকে কনফার্মেশন মেসেজ পাবেন।</p>
<img src='bkash.png'/>
<input type="hidden" name="price" value="<?php echo $price?>"/>
                        <div class="control-group">
                                <label class="control-label">ডেস্ক্রিপশন   </label>
                                <div class="controls">
                                    <input type="text" placeholder="ডেস্ক্রিপশন  " class="span6  popovers" data-trigger="hover" data-content="বিকাশ ট্রান্সেকশন  নাম্বার  "  name="description" data-original-title="বিকাশ ট্রান্সেকশন  নাম্বার " required />
                                </div>
                            </div> 
                          <div class="control-group">
                                <label class="control-label">বিকাশ ট্রান্সেকশন  নাম্বার  </label>
                                <div class="controls">
                                    <input type="text" placeholder="বিকাশ ট্রান্সেকশন  নাম্বার  " class="span6  popovers" data-trigger="hover" data-content="বিকাশ ট্রান্সেকশন  নাম্বার  "  name="bkash_trn" data-original-title="বিকাশ ট্রান্সেকশন  নাম্বার " required />
                                </div>
                            </div> 
                              <div class="form-actions">
                                <button type="submit" name="apply" class="btn btn-success btn_success_custom">Submit</button>
                                <button type="button" class="btn">Cancel</button>
                            </div>
<?php
}
else
{
echo mysqli_error($conn);	
}

?>