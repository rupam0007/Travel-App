<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Region;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@vraman.com',
            'password' => Hash::make('password'),
        ]);

        // Create Regions
        $regions = [
            ['name' => 'North India', 'slug' => 'north-india', 'image' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=600'],
            ['name' => 'South India', 'slug' => 'south-india', 'image' => 'https://images.unsplash.com/photo-1582510003544-4d00b7f74220?w=600'],
            ['name' => 'East India', 'slug' => 'east-india', 'image' => 'https://images.unsplash.com/photo-1558431382-27e303142255?w=600'],
            ['name' => 'West India', 'slug' => 'west-india', 'image' => 'https://images.unsplash.com/photo-1567157577867-05ccb1388e66?w=600'],
            ['name' => 'Central India', 'slug' => 'central-india', 'image' => 'https://images.unsplash.com/photo-1590050751621-e98f2a1a4be7?w=600'],
            ['name' => 'North East India', 'slug' => 'north-east-india', 'image' => 'https://images.unsplash.com/photo-1626621341517-bbf3d9990a23?w=600'],
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }

        // Create Categories
        $categories = [
            ['name' => 'Honeymoon', 'slug' => 'honeymoon', 'icon' => 'fa-heart', 'image' => 'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=400'],
            ['name' => 'Family', 'slug' => 'family', 'icon' => 'fa-users', 'image' => 'https://images.unsplash.com/photo-1602002418082-dd4a5795bc2b?w=400'],
            ['name' => 'Adventure', 'slug' => 'adventure', 'icon' => 'fa-mountain', 'image' => 'https://images.unsplash.com/photo-1533130061792-64b345e4a833?w=400'],
            ['name' => 'Pilgrimage', 'slug' => 'pilgrimage', 'icon' => 'fa-pray', 'image' => 'https://images.unsplash.com/photo-1561361513-2d000a50f0dc?w=400'],
            ['name' => 'Wildlife', 'slug' => 'wildlife', 'icon' => 'fa-paw', 'image' => 'https://images.unsplash.com/photo-1535941339077-2dd1c7963098?w=400'],
            ['name' => 'Beach', 'slug' => 'beach', 'icon' => 'fa-umbrella-beach', 'image' => 'https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?w=400'],
            ['name' => 'Hill Station', 'slug' => 'hill-station', 'icon' => 'fa-cloud-sun', 'image' => 'https://images.unsplash.com/photo-1626621341517-bbf3d9990a23?w=400'],
            ['name' => 'Heritage', 'slug' => 'heritage', 'icon' => 'fa-landmark', 'image' => 'https://images.unsplash.com/photo-1548013146-72479768bada?w=400'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create Destinations
        $destinations = [
            ['name' => 'Jaipur', 'slug' => 'jaipur', 'region_id' => 1, 'description' => 'The Pink City, known for its stunning palaces, forts, and vibrant culture.', 'image' => 'https://images.unsplash.com/photo-1477587458883-47145ed94245?w=600', 'best_time_to_visit' => 'October to March', 'is_featured' => true],
            ['name' => 'Goa', 'slug' => 'goa', 'region_id' => 4, 'description' => 'India\'s beach paradise with golden sands, vibrant nightlife, and Portuguese heritage.', 'image' => 'https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?w=600', 'best_time_to_visit' => 'November to February', 'is_featured' => true],
            ['name' => 'Kerala', 'slug' => 'kerala', 'region_id' => 2, 'description' => 'God\'s Own Country - backwaters, beaches, hill stations, and Ayurveda.', 'image' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=600', 'best_time_to_visit' => 'September to March', 'is_featured' => true],
            ['name' => 'Manali', 'slug' => 'manali', 'region_id' => 1, 'description' => 'A popular hill station nestled in the Himalayas with snow-capped mountains.', 'image' => 'https://images.unsplash.com/photo-1626621341517-bbf3d9990a23?w=600', 'best_time_to_visit' => 'October to June', 'is_featured' => true],
            ['name' => 'Udaipur', 'slug' => 'udaipur', 'region_id' => 1, 'description' => 'The City of Lakes, known for its romantic setting and royal heritage.', 'image' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=600', 'best_time_to_visit' => 'September to March', 'is_featured' => true],
            ['name' => 'Shimla', 'slug' => 'shimla', 'region_id' => 1, 'description' => 'The Queen of Hill Stations with colonial architecture and scenic beauty.', 'image' => 'https://images.unsplash.com/photo-1597074866923-dc0589150358?w=600', 'best_time_to_visit' => 'March to June, December', 'is_featured' => true],
            ['name' => 'Agra', 'slug' => 'agra', 'region_id' => 1, 'description' => 'Home to the iconic Taj Mahal and Mughal heritage.', 'image' => 'https://images.unsplash.com/photo-1564507592333-c60657eea523?w=600', 'best_time_to_visit' => 'October to March', 'is_featured' => true],
            ['name' => 'Varanasi', 'slug' => 'varanasi', 'region_id' => 1, 'description' => 'The spiritual capital of India on the banks of holy river Ganges.', 'image' => 'https://images.unsplash.com/photo-1561361513-2d000a50f0dc?w=600', 'best_time_to_visit' => 'October to March', 'is_featured' => false],
            ['name' => 'Darjeeling', 'slug' => 'darjeeling', 'region_id' => 3, 'description' => 'The Queen of Hills, famous for tea gardens and Himalayan views.', 'image' => 'https://images.unsplash.com/photo-1544634076-a90dfd4e6a61?w=600', 'best_time_to_visit' => 'March to May, October to December', 'is_featured' => false],
            ['name' => 'Andaman Islands', 'slug' => 'andaman-islands', 'region_id' => 3, 'description' => 'Pristine beaches, coral reefs, and adventure water sports.', 'image' => 'https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?w=600', 'best_time_to_visit' => 'November to May', 'is_featured' => true],
            ['name' => 'Leh Ladakh', 'slug' => 'leh-ladakh', 'region_id' => 1, 'description' => 'Land of high passes with dramatic landscapes and Buddhist monasteries.', 'image' => 'https://images.unsplash.com/photo-1533130061792-64b345e4a833?w=600', 'best_time_to_visit' => 'May to September', 'is_featured' => true],
            ['name' => 'Mumbai', 'slug' => 'mumbai', 'region_id' => 4, 'description' => 'The city of dreams - Bollywood, colonial architecture, and vibrant street life.', 'image' => 'https://images.unsplash.com/photo-1567157577867-05ccb1388e66?w=600', 'best_time_to_visit' => 'November to February', 'is_featured' => false],
        ];

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }

        // Create Packages
        $packages = [
            [
                'name' => 'Golden Triangle Tour', 'slug' => 'golden-triangle-tour', 'destination_id' => 7, 'category_id' => 8,
                'description' => 'Experience the best of India with this classic tour covering Delhi, Agra, and Jaipur. Visit the iconic Taj Mahal, explore magnificent forts and palaces.',
                'days' => 6, 'nights' => 5, 'price' => 22999, 'original_price' => 25999,
                'image' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=600',
                'inclusions' => ['5 nights accommodation', 'Daily breakfast', 'AC vehicle', 'Professional guide', 'Monument entrance fees', 'Airport transfers'],
                'exclusions' => ['Flights', 'Lunch and dinner', 'Personal expenses', 'Tips'],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrive Delhi', 'description' => 'Arrival at Delhi airport. Transfer to hotel.'],
                    ['day' => 2, 'title' => 'Delhi Sightseeing', 'description' => 'Full day tour of Old and New Delhi.'],
                    ['day' => 3, 'title' => 'Delhi to Agra', 'description' => 'Drive to Agra. Visit Taj Mahal at sunset.'],
                    ['day' => 4, 'title' => 'Agra to Jaipur', 'description' => 'Morning visit Agra Fort. Drive to Jaipur.'],
                    ['day' => 5, 'title' => 'Jaipur Sightseeing', 'description' => 'Full day tour - Amber Fort, City Palace, Hawa Mahal.'],
                    ['day' => 6, 'title' => 'Departure', 'description' => 'Transfer to airport.'],
                ],
                'rating' => 4.8, 'reviews_count' => 245, 'is_featured' => true,
            ],
            [
                'name' => 'Kerala Backwaters Honeymoon', 'slug' => 'kerala-backwaters-honeymoon', 'destination_id' => 3, 'category_id' => 1,
                'description' => 'A romantic getaway through the serene backwaters of Kerala with houseboat stays and Ayurvedic spa.',
                'days' => 7, 'nights' => 6, 'price' => 39999, 'original_price' => 45999,
                'image' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=600',
                'inclusions' => ['6 nights accommodation', 'Houseboat stay', 'All meals on houseboat', 'AC vehicle', 'Couple spa session'],
                'exclusions' => ['Flights', 'Personal expenses', 'Activities not mentioned'],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrive Cochin', 'description' => 'Arrival at Cochin airport. Transfer to Munnar.'],
                    ['day' => 2, 'title' => 'Munnar', 'description' => 'Visit tea plantations, Mattupetty Dam.'],
                    ['day' => 3, 'title' => 'Munnar to Thekkady', 'description' => 'Drive to Thekkady. Spice plantation tour.'],
                    ['day' => 4, 'title' => 'Thekkady to Alleppey', 'description' => 'Check-in to houseboat for overnight cruise.'],
                    ['day' => 5, 'title' => 'Alleppey to Kovalam', 'description' => 'Disembark and drive to Kovalam beach.'],
                    ['day' => 6, 'title' => 'Kovalam', 'description' => 'Relax at beach. Ayurvedic spa treatment.'],
                    ['day' => 7, 'title' => 'Departure', 'description' => 'Transfer to Trivandrum airport.'],
                ],
                'rating' => 4.9, 'reviews_count' => 189, 'is_featured' => true,
            ],
            [
                'name' => 'Goa Beach Holiday', 'slug' => 'goa-beach-holiday', 'destination_id' => 2, 'category_id' => 6,
                'description' => 'Sun, sand, and sea! Enjoy the best beaches of Goa with water sports and nightlife.',
                'days' => 5, 'nights' => 4, 'price' => 15999, 'original_price' => 18999,
                'image' => 'https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?w=600',
                'inclusions' => ['4 nights beach resort', 'Daily breakfast', 'North Goa tour', 'South Goa tour', 'Airport transfers'],
                'exclusions' => ['Flights', 'Water sports', 'Lunch and dinner'],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrive Goa', 'description' => 'Arrival at Goa airport. Transfer to resort.'],
                    ['day' => 2, 'title' => 'North Goa', 'description' => 'Visit Calangute, Baga, Anjuna beaches.'],
                    ['day' => 3, 'title' => 'South Goa', 'description' => 'Explore Palolem, Colva beaches.'],
                    ['day' => 4, 'title' => 'Leisure Day', 'description' => 'Free day for water sports or relaxation.'],
                    ['day' => 5, 'title' => 'Departure', 'description' => 'Transfer to airport.'],
                ],
                'rating' => 4.7, 'reviews_count' => 312, 'is_featured' => true,
            ],
            [
                'name' => 'Manali Adventure Package', 'slug' => 'manali-adventure-package', 'destination_id' => 4, 'category_id' => 3,
                'description' => 'Thrilling adventure activities in the Himalayas - river rafting, paragliding, trekking!',
                'days' => 6, 'nights' => 5, 'price' => 19999, 'original_price' => 22999,
                'image' => 'https://images.unsplash.com/photo-1626621341517-bbf3d9990a23?w=600',
                'inclusions' => ['5 nights accommodation', 'Daily breakfast', 'River rafting', 'Paragliding', 'Solang Valley tour'],
                'exclusions' => ['Flights', 'Lunch and dinner', 'Personal expenses'],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrive Manali', 'description' => 'Arrival at Manali. Check-in and rest.'],
                    ['day' => 2, 'title' => 'Solang Valley', 'description' => 'Paragliding, zorbing at Solang.'],
                    ['day' => 3, 'title' => 'Rohtang Pass', 'description' => 'Full day excursion to Rohtang.'],
                    ['day' => 4, 'title' => 'River Rafting', 'description' => 'White water rafting in Beas river.'],
                    ['day' => 5, 'title' => 'Local Sightseeing', 'description' => 'Hadimba Temple, Vashisht, Old Manali.'],
                    ['day' => 6, 'title' => 'Departure', 'description' => 'Transfer to Bhuntar airport.'],
                ],
                'rating' => 4.6, 'reviews_count' => 178, 'is_featured' => true,
            ],
            [
                'name' => 'Rajasthan Royal Heritage', 'slug' => 'rajasthan-royal-heritage', 'destination_id' => 1, 'category_id' => 8,
                'description' => 'Experience the royal grandeur of Rajasthan with magnificent forts, palaces, and desert safari.',
                'days' => 10, 'nights' => 9, 'price' => 49999, 'original_price' => 55999,
                'image' => 'https://images.unsplash.com/photo-1477587458883-47145ed94245?w=600',
                'inclusions' => ['9 nights heritage hotels', 'Daily breakfast', 'AC vehicle', 'Desert camp stay', 'Camel safari'],
                'exclusions' => ['Flights', 'Lunch and dinner', 'Monument fees', 'Tips'],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrive Jaipur', 'description' => 'Arrival at Jaipur.'],
                    ['day' => 2, 'title' => 'Jaipur', 'description' => 'Full day sightseeing.'],
                    ['day' => 3, 'title' => 'Jaipur to Jodhpur', 'description' => 'Drive to Jodhpur.'],
                    ['day' => 4, 'title' => 'Jodhpur to Jaisalmer', 'description' => 'Drive to Jaisalmer.'],
                    ['day' => 5, 'title' => 'Jaisalmer', 'description' => 'Fort, Haveli, camel safari.'],
                    ['day' => 6, 'title' => 'Jaisalmer to Udaipur', 'description' => 'Drive to Udaipur.'],
                    ['day' => 7, 'title' => 'Udaipur', 'description' => 'City Palace, Lake Pichola.'],
                    ['day' => 8, 'title' => 'Udaipur to Pushkar', 'description' => 'Drive to Pushkar.'],
                    ['day' => 9, 'title' => 'Pushkar to Jaipur', 'description' => 'Return to Jaipur.'],
                    ['day' => 10, 'title' => 'Departure', 'description' => 'Transfer to airport.'],
                ],
                'rating' => 4.9, 'reviews_count' => 156, 'is_featured' => true,
            ],
            [
                'name' => 'Ladakh Bike Expedition', 'slug' => 'ladakh-bike-expedition', 'destination_id' => 11, 'category_id' => 3,
                'description' => 'The ultimate biking adventure through the highest motorable roads in the world.',
                'days' => 11, 'nights' => 10, 'price' => 42999, 'original_price' => 45999,
                'image' => 'https://images.unsplash.com/photo-1533130061792-64b345e4a833?w=600',
                'inclusions' => ['Royal Enfield 350cc bike', 'Fuel', '10 nights accommodation', 'Mechanic support', 'All permits'],
                'exclusions' => ['Flights', 'Meals', 'Personal expenses', 'Medical expenses'],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrive Manali', 'description' => 'Bike allotment and briefing.'],
                    ['day' => 2, 'title' => 'Manali to Jispa', 'description' => 'Ride via Rohtang Pass.'],
                    ['day' => 3, 'title' => 'Jispa to Sarchu', 'description' => 'Cross Baralacha La pass.'],
                    ['day' => 4, 'title' => 'Sarchu to Leh', 'description' => 'Epic ride to Leh.'],
                    ['day' => 5, 'title' => 'Leh Rest', 'description' => 'Acclimatization day.'],
                    ['day' => 6, 'title' => 'Leh to Nubra', 'description' => 'Ride over Khardung La.'],
                    ['day' => 7, 'title' => 'Nubra to Pangong', 'description' => 'Ride to Pangong Lake.'],
                    ['day' => 8, 'title' => 'Pangong to Leh', 'description' => 'Return via Chang La.'],
                    ['day' => 9, 'title' => 'Buffer Day', 'description' => 'Extra day for delays.'],
                    ['day' => 10, 'title' => 'Leh', 'description' => 'Free day for shopping.'],
                    ['day' => 11, 'title' => 'Departure', 'description' => 'Transfer to Leh airport.'],
                ],
                'rating' => 4.8, 'reviews_count' => 98, 'is_featured' => true,
            ],
            [
                'name' => 'Andaman Beach Paradise', 'slug' => 'andaman-beach-paradise', 'destination_id' => 10, 'category_id' => 6,
                'description' => 'Pristine beaches, scuba diving, and tropical island hopping in the Andaman Islands.',
                'days' => 7, 'nights' => 6, 'price' => 34999, 'original_price' => 38999,
                'image' => 'https://images.unsplash.com/photo-1590523741831-ab7e8b8f9c7f?w=600',
                'inclusions' => ['6 nights accommodation', 'Daily breakfast', 'Ferry tickets', 'Sightseeing', 'Snorkeling'],
                'exclusions' => ['Flights', 'Scuba diving', 'Water sports', 'Lunch and dinner'],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrive Port Blair', 'description' => 'Visit Cellular Jail.'],
                    ['day' => 2, 'title' => 'Havelock Island', 'description' => 'Ferry to Havelock.'],
                    ['day' => 3, 'title' => 'Havelock', 'description' => 'Snorkeling at Elephant Beach.'],
                    ['day' => 4, 'title' => 'Neil Island', 'description' => 'Ferry to Neil Island.'],
                    ['day' => 5, 'title' => 'Port Blair', 'description' => 'Return to Port Blair.'],
                    ['day' => 6, 'title' => 'Port Blair', 'description' => 'Chidiya Tapu for sunset.'],
                    ['day' => 7, 'title' => 'Departure', 'description' => 'Transfer to airport.'],
                ],
                'rating' => 4.7, 'reviews_count' => 134, 'is_featured' => true,
            ],
            [
                'name' => 'Shimla Manali Family Tour', 'slug' => 'shimla-manali-family-tour', 'destination_id' => 6, 'category_id' => 2,
                'description' => 'Perfect family vacation to the beautiful hill stations of Himachal Pradesh.',
                'days' => 8, 'nights' => 7, 'price' => 25999, 'original_price' => 28999,
                'image' => 'https://images.unsplash.com/photo-1597074866923-dc0589150358?w=600',
                'inclusions' => ['7 nights hotels', 'Daily breakfast', 'AC vehicle', 'All sightseeing', 'Toy train ride'],
                'exclusions' => ['Flights', 'Lunch and dinner', 'Personal expenses', 'Adventure activities'],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Delhi to Shimla', 'description' => 'Drive to Shimla.'],
                    ['day' => 2, 'title' => 'Shimla', 'description' => 'Kufri excursion.'],
                    ['day' => 3, 'title' => 'Shimla to Manali', 'description' => 'Scenic drive to Manali.'],
                    ['day' => 4, 'title' => 'Manali', 'description' => 'Local sightseeing.'],
                    ['day' => 5, 'title' => 'Solang Valley', 'description' => 'Full day at Solang.'],
                    ['day' => 6, 'title' => 'Rohtang/Atal Tunnel', 'description' => 'Excursion to Rohtang.'],
                    ['day' => 7, 'title' => 'Manali to Chandigarh', 'description' => 'Drive to Chandigarh.'],
                    ['day' => 8, 'title' => 'Departure', 'description' => 'Transfer to airport.'],
                ],
                'rating' => 4.6, 'reviews_count' => 267, 'is_featured' => false,
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }

        // Create Reviews
        $reviews = [
            ['package_id' => 1, 'name' => 'Rahul Verma', 'email' => 'rahul@email.com', 'rating' => 5, 'review' => 'Amazing experience! The guide was very knowledgeable and hotels were excellent.', 'is_approved' => true],
            ['package_id' => 1, 'name' => 'Sarah Johnson', 'email' => 'sarah@email.com', 'rating' => 5, 'review' => 'Best trip ever! Taj Mahal at sunrise was magical.', 'is_approved' => true],
            ['package_id' => 2, 'name' => 'Priya Nair', 'email' => 'priya@email.com', 'rating' => 5, 'review' => 'Perfect honeymoon! The houseboat experience was unforgettable.', 'is_approved' => true],
            ['package_id' => 3, 'name' => 'John Smith', 'email' => 'john@email.com', 'rating' => 4, 'review' => 'Great beaches and good food. Would have liked more time in South Goa.', 'is_approved' => true],
            ['package_id' => 4, 'name' => 'Amit Sharma', 'email' => 'amit@email.com', 'rating' => 5, 'review' => 'Paragliding was thrilling! Well organized trip.', 'is_approved' => true],
            ['package_id' => 5, 'name' => 'Emily Davis', 'email' => 'emily@email.com', 'rating' => 5, 'review' => 'Rajasthan is incredible! The desert camping was the highlight.', 'is_approved' => true],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }

        // Create Sliders
        $sliders = [
            ['title' => 'Discover Incredible India', 'subtitle' => 'Experience the magic of diverse cultures, heritage, and natural beauty', 'image' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=1920', 'button_text' => 'Explore Packages', 'button_link' => '/packages', 'is_active' => true, 'sort_order' => 1],
            ['title' => 'Romantic Getaways', 'subtitle' => 'Create unforgettable memories with our honeymoon packages', 'image' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=1920', 'button_text' => 'View Honeymoon Packages', 'button_link' => '/packages?category=honeymoon', 'is_active' => true, 'sort_order' => 2],
            ['title' => 'Adventure Awaits', 'subtitle' => 'Thrilling experiences in the majestic Himalayas', 'image' => 'https://images.unsplash.com/photo-1533130061792-64b345e4a833?w=1920', 'button_text' => 'Explore Adventures', 'button_link' => '/packages?category=adventure', 'is_active' => true, 'sort_order' => 3],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }

        // Create Blogs
        $blogs = [
            ['title' => '10 Must-Visit Places in Rajasthan', 'slug' => '10-must-visit-places-in-rajasthan', 'content' => '<p>Rajasthan, the Land of Kings, is home to some of India\'s most magnificent forts, palaces, and cultural experiences...</p>', 'excerpt' => 'Discover the most beautiful and historic destinations in Rajasthan.', 'image' => 'https://images.unsplash.com/photo-1477587458883-47145ed94245?w=800', 'category' => 'Destinations', 'tags' => ['Rajasthan', 'Travel Guide', 'Heritage'], 'views' => 1250, 'is_published' => true, 'published_at' => now()->subDays(5)],
            ['title' => 'Complete Guide to Kerala Backwaters', 'slug' => 'complete-guide-to-kerala-backwaters', 'content' => '<p>The backwaters of Kerala offer one of the most unique travel experiences in India...</p>', 'excerpt' => 'Everything you need to know about experiencing Kerala backwaters.', 'image' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=800', 'category' => 'Travel Guide', 'tags' => ['Kerala', 'Backwaters', 'Houseboat'], 'views' => 890, 'is_published' => true, 'published_at' => now()->subDays(10)],
            ['title' => 'Best Time to Visit Ladakh', 'slug' => 'best-time-to-visit-ladakh', 'content' => '<p>Ladakh, the land of high passes, is a dream destination for adventure lovers...</p>', 'excerpt' => 'Plan your Ladakh trip with our comprehensive guide.', 'image' => 'https://images.unsplash.com/photo-1533130061792-64b345e4a833?w=800', 'category' => 'Travel Tips', 'tags' => ['Ladakh', 'Adventure', 'Best Time'], 'views' => 756, 'is_published' => true, 'published_at' => now()->subDays(15)],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }

        // Create Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'Vraman'],
            ['key' => 'site_tagline', 'value' => 'Your Trusted Travel Partner'],
            ['key' => 'contact_email', 'value' => 'info@vraman.com'],
            ['key' => 'contact_phone', 'value' => '+91 98765 43210'],
            ['key' => 'contact_address', 'value' => '123 Travel Street, New Delhi, India 110001'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/vraman'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/vraman'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/vraman'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com/vraman'],
            ['key' => 'whatsapp_number', 'value' => '+919876543210'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
