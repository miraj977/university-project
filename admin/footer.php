<footer class="footer-distributed ph">

			<div class="footer-left">

				      <div><a href="<?php echo "dashboard.php"; ?>"> <img src="../images/fav.png" class="logo" width="208" height="65" style="padding-left: 10px;margin-top:34px;"></a></div>
                                      <div style="clear: both"></div>

				<p class="footer-links">
                                    <a href="dashboard.php" style="padding-right: 5px">Home </a>
					·
                                        <a href="management.php" style="padding: 0px 5px;">Asset Management </a>
					·
                                        <a href="asset.php" style="padding: 0px 5px;">Assets</a>
					·
                                        <a href="user.php" style="padding-left: 5px">User</a>
					
				</p>

				<p class="footer-company-name">Loyal Partners &copy; 2019</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Marsden street, Parramatta</span> New South Wales, Australia 2150</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+61 432 097 845</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">contactus@loyalpartners.com.au</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about ph">
					<span>About the company</span>
					Started in July 2015, Loyal Partners has been providing convenient and affordable accommodation to professionals traveling to Sydney on short term or long term assignments or on business trips. Our vision is to provide luxury stay at affordable prices for individuals and corporate. Quality and customer satisfaction.Our success mantra! Ideally suited for personal or corporate guests. Security,space and comfort.
				</p>

				<div class="footer-icons">

					<a href="https://www.facebook.com/sharedaccommodation"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/loyalpartners?lang=en"><i class="fa fa-twitter"></i></a>
					<a href="https://au.linkedin.com/company/loyalty-partner"><i class="fa fa-linkedin"></i></a>

				</div>

			</div>

		</footer>

	</body>

</html>
<!--<script>
    $(function()
{

    function timeChecker()
    {
        setInterval(function()
        {
            var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");  
            timeCompare(storedTimeStamp);
        },3000);
    }


    function timeCompare(timeString)
    {
        var maxMinutes  = 1;  //GREATER THEN 1 MIN.
        var currentTime = new Date();
        var pastTime    = new Date(timeString);
        var timeDiff    = currentTime - pastTime;
        var minPast     = Math.floor( (timeDiff/360000) ); 

        if( minPast > maxMinutes)
        {
            sessionStorage.removeItem("lastTimeStamp");
            window.location = "logout.php?sessionout";
            return false;
        }else
        {
            //JUST ADDED AS A VISUAL CONFIRMATION
            console.log(currentTime +" - "+ pastTime+" - "+minPast+" min past");
        }
    }

    if(typeof(Storage) !== "undefined") 
    {
        $(document).mousemove(function()
        {
            var timeStamp = new Date();
            sessionStorage.setItem("lastTimeStamp",timeStamp);
        });

        timeChecker();
    }  
});//END JQUERY
</script>
-->
