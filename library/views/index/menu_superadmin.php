<div style="border-top:1px solid rgba(135,135,136,0.2);"></div>
<ul id="main-menu">
	<!-- add class "multiple-expanded" to allow multiple submenus to open -->
	<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
	<!-- DASHBOARD -->
	<li><a href="../index/dashboard.php"><i class="entypo-gauge"></i><span>ড্যাশবোর্ড</span></a></li>
	<!--- STUDENT MENU---->
	<li class="root-level has-sub">
		<a href="#"><i class="fa fa-group"></i><span style=""> &nbsp;পাঠক</span></a>
		<ul>
			<li><a href="../teacher_info/teacher_add.php"><span style=""><i class="entypo-dot"></i> নতুন পাঠক</span></a></li>
			<li><a href="../teacher_list/"><span style=""><i class="entypo-dot"></i> পাঠকের তথ্য</span></a></li>
		</ul>
	</li>
	<li class="root-level has-sub opened">
		<a href="#"><i class="entypo-book"></i><span>লাইব্রেরী</span></a>
		<ul>
			<li><a href="../librarian/book_add.php"><i class="entypo-dot"></i><span>নতুন বই</span></a></li>
			<li><a href="../librarian/book_list.php"><i class="entypo-dot"></i><span>বইয়ের তালিকা</span></a></li>
			<li><a href="../librarian/book_request.php"><i class="entypo-dot"></i><span>বই জারি</span></a></li>
		</ul>
	</li>
	<li>
		<a href="#"><i class="entypo-lifebuoy"></i><span>সেটিং</span></a>
		<ul>
			<li><a href="../librarian/book_category.php"><i class="entypo-dot"></i><span>বইয়ের বিভাগ  </span></a></li>
			<li><a href="../librarian/book_sub_category.php"><i class="entypo-dot"></i><span>বইয়ের উপ বিভাগ</span></a></li>
			<li><a href="../librarian/sub_category_assis.php"><i class="entypo-dot"></i><span>সহকারী বিভাগ</span></a></li>
			<li><a href="../author/"><span><i class="entypo-dot"></i>লেখক</span></a></li>
			<li><a href="../publisher/"><span><i class="entypo-dot"></i>প্রকাশক</span></a></li>
			<li><a href="../desk/"><span><i class="entypo-dot"></i>ডেস্ক</span></a></li>
		</ul>
	</li>
	<li>
		<a href="#"><i class="entypo-book"></i><span>প্রতিবেদন</span></a>
		<ul>
			<li><a href="../report/book_issued.php"><i class="entypo-dot"></i><span>বই জারি তথ্য</span></a></li>
		</ul>
	</li>
	<li><a href="../user_info/"><i class="entypo-cog"></i><span>সফ্টওয়ার ব্যবহারকারী </span></a></li>
	<li><a href="../user/User/Authentication/logout.php"><i class="entypo-logout right"></i><span>লগ আউট</span></a></li>
</ul>