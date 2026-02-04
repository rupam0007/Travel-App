@extends('layouts.app')

@section('title', 'India Visa Information - Vraman')

@section('content')
<section class="relative h-64 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="relative container mx-auto px-4 h-full flex items-center">
        <div class="text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">India Visa Information</h1>
            <p class="text-xl opacity-90">Everything you need to know about obtaining an Indian visa</p>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- e-Visa Overview -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">India e-Visa</h2>
                <p class="text-gray-600 mb-6">India offers an e-Visa facility for citizens of most countries, making the visa application process convenient and quick. The e-Visa can be applied for online without visiting an Indian embassy or consulate.</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-primary-50 rounded-lg p-4 text-center">
                        <div class="text-3xl font-bold text-primary-600 mb-2">30 Days</div>
                        <div class="text-gray-600">e-Tourist Visa</div>
                        <div class="text-sm text-gray-500">Double entry</div>
                    </div>
                    <div class="bg-primary-50 rounded-lg p-4 text-center">
                        <div class="text-3xl font-bold text-primary-600 mb-2">1 Year</div>
                        <div class="text-gray-600">e-Tourist Visa</div>
                        <div class="text-sm text-gray-500">Multiple entry</div>
                    </div>
                    <div class="bg-primary-50 rounded-lg p-4 text-center">
                        <div class="text-3xl font-bold text-primary-600 mb-2">5 Years</div>
                        <div class="text-gray-600">e-Tourist Visa</div>
                        <div class="text-sm text-gray-500">Multiple entry</div>
                    </div>
                </div>

                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                    <p class="text-yellow-800"><strong>Important:</strong> Apply for your e-Visa at least 4 days before your travel date. The official website for Indian e-Visa is <a href="https://indianvisaonline.gov.in" target="_blank" class="underline">indianvisaonline.gov.in</a></p>
                </div>
            </div>

            <!-- Requirements -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">e-Visa Requirements</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3"><i class="fas fa-passport text-primary-600 mr-2"></i>Passport Requirements</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li>• Valid for at least 6 months from arrival date</li>
                            <li>• At least 2 blank pages for stamp</li>
                            <li>• Ordinary passport (not diplomatic/service)</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3"><i class="fas fa-camera text-primary-600 mr-2"></i>Photo Requirements</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li>• Recent passport-size photograph</li>
                            <li>• White background</li>
                            <li>• Face should cover 50-60% of photo</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3"><i class="fas fa-file-alt text-primary-600 mr-2"></i>Documents Needed</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li>• Scanned copy of passport bio page</li>
                            <li>• Return flight ticket or onward journey</li>
                            <li>• Hotel booking or invitation letter</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-3"><i class="fas fa-credit-card text-primary-600 mr-2"></i>Payment</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li>• Credit/Debit card for fee payment</li>
                            <li>• Fees vary by nationality</li>
                            <li>• PayPal also accepted</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Application Process -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">How to Apply</h2>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-10 h-10 bg-primary-600 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">1</div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-gray-800">Visit Official Website</h3>
                            <p class="text-gray-600">Go to <a href="https://indianvisaonline.gov.in/evisa/" target="_blank" class="text-primary-600 underline">indianvisaonline.gov.in/evisa</a> and click on "Apply here for e-Visa"</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-10 h-10 bg-primary-600 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">2</div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-gray-800">Fill Application Form</h3>
                            <p class="text-gray-600">Complete the online application with your personal details, travel information, and passport details</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-10 h-10 bg-primary-600 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">3</div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-gray-800">Upload Documents</h3>
                            <p class="text-gray-600">Upload your passport photo page scan and recent photograph as per specifications</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-10 h-10 bg-primary-600 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">4</div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-gray-800">Pay Visa Fee</h3>
                            <p class="text-gray-600">Make the payment using credit card, debit card, or PayPal</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-10 h-10 bg-primary-600 text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">5</div>
                        <div class="ml-4">
                            <h3 class="font-semibold text-gray-800">Receive e-Visa</h3>
                            <p class="text-gray-600">You'll receive your e-Visa via email within 72 hours. Print and carry it during travel.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Entry Points -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Permitted Entry Points</h2>
                <p class="text-gray-600 mb-4">e-Visa holders can enter India through designated airports and seaports only:</p>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @php
                        $airports = ['Delhi', 'Mumbai', 'Chennai', 'Kolkata', 'Bangalore', 'Hyderabad', 'Cochin', 'Goa', 'Jaipur', 'Ahmedabad', 'Amritsar', 'Varanasi'];
                    @endphp
                    @foreach($airports as $airport)
                    <div class="bg-gray-50 rounded-lg p-3 text-center">
                        <i class="fas fa-plane text-primary-600"></i>
                        <span class="text-gray-700 ml-2">{{ $airport }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Regular Visa -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Regular/Sticker Visa</h2>
                <p class="text-gray-600 mb-4">For countries not eligible for e-Visa or for specific visa types, you'll need to apply at an Indian Embassy/Consulate or through VFS Global.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Tourist Visa</h3>
                        <p class="text-gray-600 text-sm">For tourism, visiting friends/relatives. Valid up to 10 years with multiple entries.</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Business Visa</h3>
                        <p class="text-gray-600 text-sm">For business meetings, conferences, trade fairs. Valid up to 5 years.</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Medical Visa</h3>
                        <p class="text-gray-600 text-sm">For medical treatment in India. Valid for up to 1 year with multiple entries.</p>
                    </div>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Conference Visa</h3>
                        <p class="text-gray-600 text-sm">For attending conferences, seminars, workshops. Single entry only.</p>
                    </div>
                </div>
            </div>

            <!-- Help Section -->
            <div class="bg-primary-50 rounded-xl p-8 text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Need Visa Assistance?</h3>
                <p class="text-gray-600 mb-6">Our team can guide you through the visa application process</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="inline-block bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">
                        <i class="fas fa-envelope mr-2"></i>Contact Us
                    </a>
                    <a href="https://indianvisaonline.gov.in/evisa/" target="_blank" class="inline-block border-2 border-primary-600 text-primary-600 px-6 py-3 rounded-lg font-semibold hover:bg-primary-600 hover:text-white transition">
                        <i class="fas fa-external-link-alt mr-2"></i>Official e-Visa Site
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
