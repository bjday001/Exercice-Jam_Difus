<?php  require './connect.php'; 
require_once './header.php'; ?>


    <main>
        <h1>Pour me contacter</h1>
        <p><!-- trait horizontal noir --></p>
        <div class="contact-form">
            <form method="post" action="https://formsubmit.co/contact.brahimjday@gmail.com">
                <div class="fields">
                    <div class="field half">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" placeholder="Name" required />
                    </div>
                    <div class="field half">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Email Address" required />
                    </div>
                    <div class="field">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" placeholder="Your message" required rows="4"></textarea>
                    </div>
                   
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Send Message" class="primary" /></li>
                    <li><input type="reset" value="Reset" /></li>
                </ul>
            </form>
            
        </div>
    </main><?php require_once './footer.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



</body>

</html>

