@extends('layouts.app')

@section('title', 'Terms & Conditions - Vraman')

@section('content')
<section class="relative h-64 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Terms & Conditions</h1>
            <p class="text-xl opacity-90">Please read these terms carefully before using our services</p>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">
            <p class="text-gray-600 mb-8">Last updated: {{ date('F d, Y') }}</p>

            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">1. Acceptance of Terms</h2>
                    <p class="text-gray-600">By accessing and using Vraman's website and services, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">2. Booking and Reservation</h2>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>All bookings are subject to availability and confirmation by Vraman.</li>
                        <li>A booking is confirmed only after receipt of the required advance payment.</li>
                        <li>Prices are subject to change without prior notice until a booking is confirmed.</li>
                        <li>The customer is responsible for providing accurate information at the time of booking.</li>
                        <li>Any modifications to confirmed bookings are subject to availability and may incur additional charges.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">3. Payment Terms</h2>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>A minimum of 30-50% of the total tour cost is required as advance payment for booking confirmation.</li>
                        <li>The balance payment must be made 15 days before the travel date.</li>
                        <li>For bookings made within 15 days of travel, 100% payment is required at the time of booking.</li>
                        <li>We accept payments via credit/debit cards, net banking, UPI, and bank transfers.</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">4. Cancellation & Refund Policy</h2>
                    <table class="w-full border-collapse border border-gray-200 text-gray-600">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="border border-gray-200 px-4 py-2 text-left">Days Before Departure</th>
                                <th class="border border-gray-200 px-4 py-2 text-left">Cancellation Charges</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-200 px-4 py-2">30 days or more</td>
                                <td class="border border-gray-200 px-4 py-2">10% of tour cost</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-200 px-4 py-2">15-29 days</td>
                                <td class="border border-gray-200 px-4 py-2">50% of tour cost</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-200 px-4 py-2">7-14 days</td>
                                <td class="border border-gray-200 px-4 py-2">75% of tour cost</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-200 px-4 py-2">Less than 7 days</td>
                                <td class="border border-gray-200 px-4 py-2">100% of tour cost (No refund)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">5. Tour Inclusions & Exclusions</h2>
                    <p class="text-gray-600 mb-4">Unless specifically mentioned, our tour packages include:</p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2 mb-4">
                        <li>Accommodation as per the itinerary</li>
                        <li>Meals as mentioned (usually breakfast)</li>
                        <li>Transportation by air-conditioned vehicle</li>
                        <li>Sightseeing as per the itinerary</li>
                    </ul>
                    <p class="text-gray-600 mb-4">Not included unless specifically mentioned:</p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Airfare/train tickets</li>
                        <li>Personal expenses like tips, laundry, telephone calls</li>
                        <li>Entry fees to monuments and attractions</li>
                        <li>Travel insurance</li>
                        <li>Any items not specifically mentioned in inclusions</li>
                    </ul>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">6. Liability</h2>
                    <p class="text-gray-600">Vraman acts as an agent for various service providers (hotels, transport, etc.) and shall not be liable for any injury, damage, loss, accident, delay or irregularity that may be caused by any defect in services provided by these vendors. We are not responsible for any loss or theft of personal belongings during the tour.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">7. Force Majeure</h2>
                    <p class="text-gray-600">Vraman shall not be liable for any failure or delay in performing any obligation if such failure or delay results from circumstances beyond our control including but not limited to natural disasters, epidemics, government actions, strikes, civil unrest, or any other force majeure events.</p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">8. Contact Information</h2>
                    <p class="text-gray-600">For any questions regarding these terms, please contact us at:</p>
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <p class="text-gray-700"><strong>Email:</strong> info@vraman.com</p>
                        <p class="text-gray-700"><strong>Phone:</strong> +91 98765 43210</p>
                        <p class="text-gray-700"><strong>Address:</strong> 123 Travel Street, New Delhi, India</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
