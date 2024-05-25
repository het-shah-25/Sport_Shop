<?php include '../templates/header.php'; ?>
<body class="bg-gray-100">
    <main class="max-w-7xl mx-auto">
        <!-- Hero Section -->
        <div class="relative">
            <img src="https://img.freepik.com/free-photo/sports-tools_53876-138077.jpg" alt="About Us Banner" class="w-full h-64 object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-white">About Us</h1>
                    <p class="text-white text-lg mt-2">Discover who we are and what we stand for.</p>
                </div>
            </div>
        </div>

        <!-- Our Mission -->
        <section class="mt-10 p-6 bg-white shadow-md">
            <h2 class="text-3xl font-bold text-center text-gray-900">Our Mission</h2>
            <p class="text-gray-600 text-center mt-4 max-w-2xl mx-auto">Our mission is to deliver unparalleled quality in all our products and services, driving innovation and excellence in our industry.</p>
        </section>

        <!-- Milestones -->
        <section class="mt-10 p-6 bg-gray-50">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800">10+</h3>
                    <p class="text-gray-600 mt-2">Years in Business</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800">500+</h3>
                    <p class="text-gray-600 mt-2">Satisfied Clients</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800">1000+</h3>
                    <p class="text-gray-600 mt-2">Projects Delivered</p>
                </div>
            </div>
        </section>

        <!-- Meet Our Team -->
        <section class="mt-10 p-6 bg-white shadow-md">
            <h2 class="text-3xl font-bold text-center text-gray-900">Meet Our Team</h2>
            <div class="flex flex-wrap justify-center gap-4 mt-6">
                <!-- Team Member 1 -->
                <div class="w-64 bg-white p-4 rounded-lg shadow-lg transform hover:-translate-y-2 transition duration-300">
                    <img src="https://images.pexels.com/photos/1043474/pexels-photo-1043474.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Team Member" class="w-32 h-32 rounded-full mx-auto">
                    <h3 class="mt-4 font-bold text-gray-800">Jane Doe</h3>
                    <p class="text-sm text-gray-600">CEO</p>
                    <p class="text-sm text-gray-500 mt-1">Jane has over 20 years of experience and is passionate about driving the company forward.</p>
                </div>
                <!-- Team Member 2 -->
                <div class="w-64 bg-white p-4 rounded-lg shadow-lg transform hover:-translate-y-2 transition duration-300">
                    <img src="https://images.pexels.com/photos/874158/pexels-photo-874158.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Team Member" class="w-32 h-32 rounded-full mx-auto">
                    <h3 class="mt-4 font-bold text-gray-800">John Smith</h3>
                    <p class="text-sm text-gray-600">CTO</p>
                    <p class="text-sm text-gray-500 mt-1">John is a pioneer in digital innovation and leads our technology strategy.</p>
                </div>
                <!-- Additional team members can be added here -->
            </div>
        </section>
    </main>
</body>
</html>


<?php include '../templates/footer.php'; ?>