<?php include_once './include/navigation.php' ?>
    <div class="container py-4">
        <section class="welcome-section">
            <h2 class="header-text fs-2">
                Welcome to GymMandu, the ultimate playground for your fitness needs.
            </h2>
        </section>
        <section class="about-section">
            <div class="about-content">
                <h2 class="[ header-text ] [ underline ]">
                    GymMandu The Fitness Workshop
                </h2>
                <p class="para-text">
                    GymMandu, its the ultimate fitness workshop. 
                    It is a grownup playground with a wide variety of equipments, 
                    weights and personal assistance that can be tailored for your fitness neeeds.
                    No matter your fitness level we've got your covered.
                    You can choose from our wide range of services that is fit your needs.
                </p>
            </div>

            <ul class="services-list list-unstyled p-0 m-0">
                <li class="service-item">
                    <a href="#" class="service-link">Personal Trainer</a>
                    <a href="#" class="learn-more">Learn More</a>
                </li>
                <li class="service-item">
                    <a href="#" class="service-link">Weights and Equipements</a>
                    <a href="#" class="learn-more">Learn More</a>
                </li>
                <li class="service-item">
                    <a href="#" class="service-link">Cardio and Yoga</a>
                    <a href="#" class="learn-more">Learn More</a>
                </li>
                <li class="service-item">
                    <a href="#" class="service-link">Injury Recovery</a>
                    <a href="#" class="learn-more">Learn More</a>
                </li>
                <li class="service-item">
                    <a href="#" class="service-link">Sauna</a>
                    <a href="#" class="learn-more">Learn More</a>
                </li>
                <li class="service-item">
                    <a href="#" class="service-link">Shop</a>
                    <a href="#" class="learn-more">Learn More</a>
                </li>
            </ul>
        </section>
        <section class="contact-section">
            <h2 class="header-text fs-2">Contact Us</h2>
            <form action="#" method="post" class="contact-form">
                <div class="mb-3">
                    <label for="name">Name*</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Your Name">
                </div>
                <div class="mb-3">
                    <label for="email">Email*</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="Your Email">
                </div>
                <div class="mb-3">
                    <label for="message">Message</label>
                    <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Your Message"></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" name="submit">Send it</button>
                </div>
            </form>
        </section>
    </div>
<?php include_once './include/footer.php' ?> 