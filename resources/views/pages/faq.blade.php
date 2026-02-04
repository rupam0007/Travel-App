@extends('layouts.app')

@section('title', 'FAQ - Vraman')

@section('content')
<!-- Hero Section -->
<section class="relative h-64 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Frequently Asked Questions</h1>
            <p class="text-xl opacity-90">Find answers to common questions about traveling with Vraman</p>
        </div>
    </div>
</section>

<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- FAQ Categories -->
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <button class="faq-cat-btn active px-5 py-2 rounded-full font-medium bg-primary-600 text-white" data-category="general">General</button>
                <button class="faq-cat-btn px-5 py-2 rounded-full font-medium bg-gray-100 text-gray-700 hover:bg-gray-200" data-category="booking">Booking</button>
                <button class="faq-cat-btn px-5 py-2 rounded-full font-medium bg-gray-100 text-gray-700 hover:bg-gray-200" data-category="payment">Payment</button>
                <button class="faq-cat-btn px-5 py-2 rounded-full font-medium bg-gray-100 text-gray-700 hover:bg-gray-200" data-category="travel">Travel</button>
            </div>

            <!-- General FAQs -->
            <div id="general" class="faq-section">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">General Questions</h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">What is the best time to travel to India?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">The best time to travel to India depends on the places you would like to visit. However, the winter season (October - March) is mostly preferred by tourists as the weather is pleasant across most regions. For hill stations, summer (April-June) is ideal, while for wildlife safaris, winter and summer are both good times.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">Is India safe for tourists?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Yes, India is generally safe for tourists. Like any travel destination, it's advisable to take standard precautions. Stick to well-known tourist areas, use reputable transportation, and keep your belongings secure. Our tour packages include experienced guides and reliable services to ensure your safety.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">What clothes should I pack for India?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Pack according to the season and region you're visiting. Light, breathable cotton clothes for summer and coastal areas. Warm layers for hill stations and North India winters. Modest clothing is recommended when visiting religious sites. Comfortable walking shoes are essential for sightseeing.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">Do I need a visa to visit India?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Yes, most foreign nationals require a visa to visit India. India offers e-Visa facility for citizens of many countries, making the process convenient. Tourist visas are typically valid for 30 days, 1 year, or 5 years with multiple entries. Visit the official Indian visa website for the latest information.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking FAQs -->
            <div id="booking" class="faq-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Booking Questions</h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">How do I book a tour package?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">You can book a tour package through our website by selecting your preferred package and clicking "Book Now". Fill in your details, choose your travel dates, and submit. Our team will contact you within 24 hours to confirm your booking. You can also call us directly or send a WhatsApp message.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">Can I customize my tour package?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Absolutely! We specialize in customized tours. You can modify any existing package or create a completely new itinerary based on your preferences. Contact our travel experts to discuss your requirements, and we'll design the perfect trip for you.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">What is the cancellation policy?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Our cancellation policy varies depending on how far in advance you cancel. Generally: 30+ days before travel - full refund minus processing fees, 15-29 days - 50% refund, 7-14 days - 25% refund, Less than 7 days - no refund. Some special tours may have different policies which will be mentioned at the time of booking.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment FAQs -->
            <div id="payment" class="faq-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Payment Questions</h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">What payment methods do you accept?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">We accept multiple payment methods including credit/debit cards, net banking, UPI, and bank transfers. For international customers, we accept PayPal and international wire transfers. All online payments are processed through secure payment gateways.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">Do I need to pay the full amount while booking?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">No, you can pay an initial deposit to confirm your booking. Typically, we require 30-50% advance payment at the time of booking, with the balance due 15 days before your travel date. Specific payment terms may vary for certain tours and will be communicated at booking.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Travel FAQs -->
            <div id="travel" class="faq-section hidden">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Travel Questions</h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">Are meals included in the tour packages?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Most of our packages include breakfast at the hotel. Lunch and dinner inclusion varies by package and is clearly mentioned in the itinerary. You can opt for meal plans (MAP/AP) during booking. We can also accommodate special dietary requirements like vegetarian, vegan, or allergy-specific meals.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">What type of vehicles are used for transfers?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">We use well-maintained, air-conditioned vehicles appropriate for your group size. Options include sedans (2-3 passengers), SUVs (4-6 passengers), and tempo travelers (7-12 passengers). All vehicles come with experienced drivers and are regularly serviced for your safety and comfort.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <button class="faq-toggle w-full text-left p-6 flex justify-between items-center" onclick="toggleFaq(this)">
                            <span class="font-semibold text-gray-800">Will I have a guide during the tour?</span>
                            <i class="fas fa-chevron-down text-primary-600 transition-transform"></i>
                        </button>
                        <div class="faq-content hidden px-6 pb-6">
                            <p class="text-gray-600">Yes, most of our packages include professional English-speaking guides at major sightseeing locations. For group tours, you'll have a tour manager accompanying you throughout. Guides in other languages can be arranged upon request at additional cost.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Still Have Questions -->
            <div class="mt-12 bg-primary-50 rounded-xl p-8 text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Still Have Questions?</h3>
                <p class="text-gray-600 mb-6">Our travel experts are here to help you</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="inline-block bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                        <i class="fas fa-envelope mr-2"></i>Contact Us
                    </a>
                    <a href="tel:+919876543210" class="inline-block border-2 border-primary-600 text-primary-600 px-6 py-3 rounded-lg font-semibold hover:bg-primary-600 hover:text-white transition">
                        <i class="fas fa-phone-alt mr-2"></i>Call Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function toggleFaq(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('i');
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }

    document.querySelectorAll('.faq-cat-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            // Update buttons
            document.querySelectorAll('.faq-cat-btn').forEach(b => {
                b.classList.remove('bg-primary-600', 'text-white');
                b.classList.add('bg-gray-100', 'text-gray-700');
            });
            this.classList.remove('bg-gray-100', 'text-gray-700');
            this.classList.add('bg-primary-600', 'text-white');

            // Show/hide sections
            const category = this.dataset.category;
            document.querySelectorAll('.faq-section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(category).classList.remove('hidden');
        });
    });
</script>
@endpush
