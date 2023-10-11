<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>E-learner</h3>
                    <p>
                    Superior College<br>
                    Malik St, Civil Lines<br>
                    Faisalabad, Punjab<br><br>
                        <strong>Phone:</strong> +923046725123<br>
                        <strong>Email:</strong>abdulrehman@gmail.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a class="active" href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about-us') }}">About</a></li>
                        <li><a href="{{ route('courses') }}">Courses</a></li>
                        <li><a href="{{ route('trainers') }}">Trainers</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    @php
                        $courses = DB::table('courses')->limit(4)->get() 
                    @endphp
                    <ul>
                        @foreach ($courses as $item)
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('course-details',$item->id) }}">{{ $item->name }}</a></li>                            
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Threre are uplode news about new courses if you fell batter than Subscribe</p>
                    <form action="" method="post">
                        <input placeholder="bilalkhan@gmail.com" type="email" name="email"><input type="submit" value="Subscribe" >
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>E-learner</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
                Designed by <a href="#">Abudul Rehman</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="https://twitter.com/Abubaka93986276" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100024864041768" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="https://www.instagram.com/abubakr_khan33/" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="https://www.linkedin.com/in/abubakar-khan-53109b21a/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer>