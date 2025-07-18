<div class="container my-5">
    <h2 class="mb-4">Contact Us</h2>

    {{-- Contact Info --}}
    <div class="mb-4">
        <p><strong>Email:</strong> <a href="mailto:support@shoppejob.com">support@shoppejob.com</a></p>
        <p><strong>Phone:</strong> +91-XXXXXXXXXX</p>
        <p><strong>Office Hours:</strong> Monday to Friday, 10:00 AM – 6:00 PM IST</p>
    </div>

    {{-- Contact Form --}}
    <div class="card mb-5">
        <div class="card-header">Send Us a Message</div>
        <div class="card-body">
            <form method="POST" action = "/">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>

    {{-- Optional: FAQ or Help Link --}}
    <p>For more help, visit our <a href="/faq">FAQ page</a>.</p>

    {{-- Optional: Map --}}
    {{-- 
    <div class="mt-4">
        <iframe 
            src="https://www.google.com/maps/embed?pb=YOUR_EMBED_URL" 
            width="100%" 
            height="300" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
    --}}
</div>