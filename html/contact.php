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
    </main>
    <?php require_once './footer.php'; ?>



