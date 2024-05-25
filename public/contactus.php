<?php include '../templates/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <main class="max-w-6xl mx-auto p-8 bg-white rounded-lg shadow-md mt-10">
        <div class="grid md:grid-cols-2 gap-10">
            <!-- Google Map Embed -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Find Us</h2>
                <div class="overflow-hidden rounded-lg h-80">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3163.158102051089!2d-122.080101284252!3d37.4219999798232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb5d4386eae1b%3A0xa4090b2b87f7235f!2sGoogleplex!5e0!3m2!1sen!2sus!4v1589980951925!5m2!1sen!2sus"
                        width="600"
                        height="450"
                        frameborder="0"
                        style="border:0;"
                        allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0"
                    ></iframe>
                </div>
            </div>
            <!-- Contact Form -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Contact Us</h2>
                <form action="send_message.php" method="post">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                        <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="John Doe">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="johndoe@example.com">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea id="message" name="message" rows="4" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your message..."></textarea>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Additional contact information -->
        <div class="text-center mt-10">
            <div class="text-lg">
                <p class="text-gray-900 font-medium">Our Address</p>
                <p class="text-gray-600">123 Business Ave, City, State, 10101</p>
            </div>
            <div class="mt-4">
                <p class="text-gray-900 font-medium">Phone</p>
                <p class="text-gray-600">(123) 456-7890</p>
            </div>
            <div class="mt-4">
                <p class="text-gray-900 font-medium">Email</p>
                <p class="text-gray-600">contact@example.com</p>
            </div>
        </div>
    </main>
</body>
</html>
<?php include '../templates/footer.php'; ?>