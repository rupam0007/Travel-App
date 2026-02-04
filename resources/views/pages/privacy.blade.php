@extends('layouts.app')

@section('title', 'Privacy Policy - Vraman')

@section('content')
<section class="relative h-64 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Privacy Policy</h1>
            <p class="text-xl opacity-90">How we collect, use, and protect your information</p>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">
            <p class="text-gray-600 mb-8">Last updated: {{ date('F d, Y') }}</p>

            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">1. Introduction</h2>
                    <p class="text-gray-600">Vraman ("we," "our," or "us") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our services.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">2. Information We Collect</h2>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Personal Information</h3>
                    <p class="text-gray-600 mb-4">We may collect personal information that you voluntarily provide, including:</p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2 mb-4">
                        <li>Name, email address, and phone number</li>
                        <li>Billing and shipping addresses</li>
                        <li>Passport details and travel documents (when required for bookings)</li>
                        <li>Payment information</li>
                        <li>Travel preferences and special requirements</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Automatically Collected Information</h3>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>IP address and browser type</li>
                        <li>Device information</li>
                        <li>Pages visited and time spent on pages</li>
                        <li>Cookies and similar tracking technologies</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">3. How We Use Your Information</h2>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>To process and confirm your bookings</li>
                        <li>To communicate with you about your reservations</li>
                        <li>To send promotional offers and newsletters (with your consent)</li>
                        <li>To improve our website and services</li>
                        <li>To comply with legal obligations</li>
                        <li>To prevent fraud and ensure security</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">4. Information Sharing</h2>
                    <p class="text-gray-600 mb-4">We may share your information with:</p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li><strong>Service Providers:</strong> Hotels, airlines, transport companies to fulfill your bookings</li>
                        <li><strong>Payment Processors:</strong> To process your payments securely</li>
                        <li><strong>Legal Requirements:</strong> When required by law or to protect our rights</li>
                    </ul>
                    <p class="text-gray-600 mt-4">We do not sell your personal information to third parties for marketing purposes.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">5. Data Security</h2>
                    <p class="text-gray-600">We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the Internet is 100% secure.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">6. Cookies</h2>
                    <p class="text-gray-600">We use cookies and similar tracking technologies to enhance your browsing experience. You can control cookies through your browser settings. Disabling cookies may affect certain features of our website.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">7. Your Rights</h2>
                    <p class="text-gray-600 mb-4">You have the right to:</p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Access your personal information</li>
                        <li>Correct inaccurate data</li>
                        <li>Request deletion of your data</li>
                        <li>Opt-out of marketing communications</li>
                        <li>Withdraw consent at any time</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">8. Children's Privacy</h2>
                    <p class="text-gray-600">Our services are not intended for children under 18. We do not knowingly collect personal information from children without parental consent.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">9. Changes to This Policy</h2>
                    <p class="text-gray-600">We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on this page with an updated revision date.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">10. Contact Us</h2>
                    <p class="text-gray-600">If you have questions about this Privacy Policy, please contact us:</p>
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <p class="text-gray-700"><strong>Email:</strong> privacy@vraman.com</p>
                        <p class="text-gray-700"><strong>Phone:</strong> +91 98765 43210</p>
                        <p class="text-gray-700"><strong>Address:</strong> 123 Travel Street, New Delhi, India</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
