@extends('admin.layout')

@section('title', 'Settings')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
    <!-- General Settings -->
    <div class="table-card lg:col-span-2">
        <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 20px; color: #1f2937; border-bottom: 2px solid #f3f4f6; padding-bottom: 15px;">
            <i class="fas fa-cog"></i> General Settings
        </h3>
        
        <form action="{{ route('admin.settings.general') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" id="site_name" name="site_name" value="{{ $settings['site_name'] ?? 'Vraman' }}" required>
                </div>
                
                <div class="form-group">
                    <label for="site_email">Site Email</label>
                    <input type="email" id="site_email" name="site_email" value="{{ $settings['site_email'] ?? '' }}" required>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="form-group">
                    <label for="site_phone">Phone Number</label>
                    <input type="text" id="site_phone" name="site_phone" value="{{ $settings['site_phone'] ?? '' }}" required>
                </div>
                
                <div class="form-group">
                    <label for="site_address">Address</label>
                    <input type="text" id="site_address" name="site_address" value="{{ $settings['site_address'] ?? '' }}" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="site_description">Site Description</label>
                <textarea id="site_description" name="site_description" style="min-height: 80px;" required>{{ $settings['site_description'] ?? '' }}</textarea>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="form-group">
                    <label for="currency">Currency Code</label>
                    <input type="text" id="currency" name="currency" value="{{ $settings['currency'] ?? 'INR' }}" maxlength="3" required>
                </div>
                
                <div class="form-group">
                    <label for="currency_symbol">Currency Symbol</label>
                    <input type="text" id="currency_symbol" name="currency_symbol" value="{{ $settings['currency_symbol'] ?? '₹' }}" maxlength="5" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="google_analytics_id">Google Analytics ID</label>
                <input type="text" id="google_analytics_id" name="google_analytics_id" value="{{ $settings['google_analytics_id'] ?? '' }}" placeholder="G-XXXXXXXXXX">
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save General Settings
            </button>
        </form>
    </div>
    
    <!-- Sidebar Settings -->
    <div>
        <!-- Social Media -->
        <div class="table-card" style="margin-bottom: 20px;">
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px;">
                <i class="fas fa-share-alt"></i> Social Media
            </h3>
            
            <form action="{{ route('admin.settings.general') }}" method="POST">
                @csrf
                
                <input type="hidden" name="site_name" value="{{ $settings['site_name'] ?? 'Vraman' }}">
                <input type="hidden" name="site_email" value="{{ $settings['site_email'] ?? '' }}">
                <input type="hidden" name="site_phone" value="{{ $settings['site_phone'] ?? '' }}">
                <input type="hidden" name="site_address" value="{{ $settings['site_address'] ?? '' }}">
                <input type="hidden" name="site_description" value="{{ $settings['site_description'] ?? '' }}">
                <input type="hidden" name="currency" value="{{ $settings['currency'] ?? 'INR' }}">
                <input type="hidden" name="currency_symbol" value="{{ $settings['currency_symbol'] ?? '₹' }}">
                
                <div class="form-group">
                    <label for="facebook_url"><i class="fab fa-facebook"></i> Facebook</label>
                    <input type="url" id="facebook_url" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}" placeholder="https://facebook.com/...">
                </div>
                
                <div class="form-group">
                    <label for="twitter_url"><i class="fab fa-twitter"></i> Twitter</label>
                    <input type="url" id="twitter_url" name="twitter_url" value="{{ $settings['twitter_url'] ?? '' }}" placeholder="https://twitter.com/...">
                </div>
                
                <div class="form-group">
                    <label for="instagram_url"><i class="fab fa-instagram"></i> Instagram</label>
                    <input type="url" id="instagram_url" name="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}" placeholder="https://instagram.com/...">
                </div>
                
                <div class="form-group">
                    <label for="linkedin_url"><i class="fab fa-linkedin"></i> LinkedIn</label>
                    <input type="url" id="linkedin_url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}" placeholder="https://linkedin.com/...">
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;">
                    <i class="fas fa-save"></i> Save Social Links
                </button>
            </form>
        </div>
        
        <!-- Maintenance Mode -->
        <div class="table-card">
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px;">
                <i class="fas fa-wrench"></i> Maintenance Mode
            </h3>
            
            <form action="{{ route('admin.settings.general') }}" method="POST">
                @csrf
                
                <input type="hidden" name="site_name" value="{{ $settings['site_name'] ?? 'Vraman' }}">
                <input type="hidden" name="site_email" value="{{ $settings['site_email'] ?? '' }}">
                <input type="hidden" name="site_phone" value="{{ $settings['site_phone'] ?? '' }}">
                <input type="hidden" name="site_address" value="{{ $settings['site_address'] ?? '' }}">
                <input type="hidden" name="site_description" value="{{ $settings['site_description'] ?? '' }}">
                <input type="hidden" name="currency" value="{{ $settings['currency'] ?? 'INR' }}">
                <input type="hidden" name="currency_symbol" value="{{ $settings['currency_symbol'] ?? '₹' }}">
                
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="maintenance_mode" value="1" {{ ($settings['maintenance_mode'] ?? false) ? 'checked' : '' }}>
                        Enable Maintenance Mode
                    </label>
                    <p style="font-size: 12px; color: #6b7280; margin-top: 5px;">When enabled, visitors will see a maintenance page.</p>
                </div>
                
                <button type="submit" class="btn btn-warning" style="width: 100%;">
                    <i class="fas fa-save"></i> Update Status
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Quick Stats -->
<div class="table-card" style="margin-top: 20px;">
    <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 20px; color: #1f2937;">
        <i class="fas fa-info-circle"></i> System Information
    </h3>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
        <div style="background-color: #f9fafb; padding: 15px; border-radius: 8px;">
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">PHP Version</p>
            <p style="font-size: 18px; font-weight: 600; color: #1f2937;">{{ PHP_VERSION }}</p>
        </div>
        <div style="background-color: #f9fafb; padding: 15px; border-radius: 8px;">
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Laravel Version</p>
            <p style="font-size: 18px; font-weight: 600; color: #1f2937;">{{ app()->version() }}</p>
        </div>
        <div style="background-color: #f9fafb; padding: 15px; border-radius: 8px;">
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Environment</p>
            <p style="font-size: 18px; font-weight: 600; color: #1f2937;">{{ app()->environment() }}</p>
        </div>
        <div style="background-color: #f9fafb; padding: 15px; border-radius: 8px;">
            <p style="font-size: 13px; color: #6b7280; margin-bottom: 5px;">Debug Mode</p>
            <p style="font-size: 18px; font-weight: 600; color: {{ config('app.debug') ? '#ef4444' : '#10b981' }};">
                {{ config('app.debug') ? 'Enabled' : 'Disabled' }}
            </p>
        </div>
    </div>
</div>
@endsection
