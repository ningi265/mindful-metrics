@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/profile-styles.css') }}">
@endsection
@section('page_header')
<div class="page-header">
    <h1>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
        </svg>
        User Profile
    </h1>
    <div class="date">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="16" y1="2" x2="16" y2="6"></line>
            <line x1="8" y1="2" x2="8" y2="6"></line>
            <line x1="3" y1="10" x2="21" y2="10"></line>
        </svg>
        Today: May 6, 2025
    </div>
</div>
@endsection


@section('content')
    <!-- Profile Dashboard Content -->
    <div class="profile-container animate-fadeIn">
        <!-- Success Message -->
        @if (session('status'))
        <div class="status-message {{ session('status') }}">
            <div class="status-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="status-content">
                @if (session('status') === 'profile-updated')
                    Profile information updated successfully
                @elseif (session('status') === 'password-updated')
                    Password updated successfully
                @elseif (session('status') === 'avatar-updated')
                    Profile picture updated successfully
                @endif
            </div>
        </div>
        @endif

        <div class="profile-layout">
            <!-- Profile Sidebar -->
            <div class="profile-sidebar">
                <div class="profile-avatar-container">
                <div class="profile-avatar-wrapper">
    <div class="profile-avatar">
        @if($user->avatar)
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" />
        @else
            <div class="profile-avatar-placeholder">
                {{ strtoupper(substr($user->name, 0, 2)) }}
            </div>
        @endif
    </div>
    
    <button type="button" class="avatar-upload-btn" onclick="document.getElementById('avatar-upload-modal').classList.remove('hidden')">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
        <circle cx="12" cy="13" r="4"></circle>
        </svg>
    </button>
</div>
                    <h2 class="profile-name">{{ $user->name }}</h2>
                    <p class="profile-position">{{ $user->position ?? 'No position set' }}</p>
                </div>
                
                <ul class="profile-nav">
                    <li>
                        <a href="#personal-info" class="active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            Personal Information
                        </a>
                    </li>
                    <li>
                        <a href="#password">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            Password
                        </a>
                    </li>
                    <li>
                        <a href="#notifications">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            Notifications
                        </a>
                    </li>
                    <li>
                        <a href="#activity">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                            Activity Log
                        </a>
                    </li>
                </ul>
                
                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-value">428</div>
                        <div class="stat-label">Reports Generated</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">124</div>
                        <div class="stat-label">Days Active</div>
                    </div>
                </div>
            </div>
            
            <!-- Profile Content -->
            <div class="profile-content">
                <!-- Personal Information -->
                <div id="personal-info" class="profile-section active">
                    <div class="section-header">
                        <h3>Personal Information</h3>
                        <p>Update your personal details and contact information</p>
                    </div>
                    
                    <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" id="position" name="position" value="{{ old('position', $user->position) }}">
                                @error('position')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea id="bio" name="bio" rows="4">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    <polyline points="7 3 7 8 15 8"></polyline>
                                </svg>
                                Save Changes
                            </button>
                            <button type="reset" class="btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2.5 2v6h6M21.5 22v-6h-6"></path>
                                    <path d="M22 11.5A10 10 0 0 0 3.2 7.2M2 12.5a10 10 0 0 0 18.8 4.2"></path>
                                </svg>
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Password Section -->
                <div id="password" class="profile-section">
                    <div class="section-header">
                        <h3>Change Password</h3>
                        <p>Ensure your account is using a secure password</p>
                    </div>
                    
                    <form action="{{ route('password.update') }}" method="POST" class="profile-form">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" id="current_password" name="current_password" required>
                            @error('current_password', 'updatePassword')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="password" name="password" required>
                            @error('password', 'updatePassword')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Notifications Section -->
                <div id="notifications" class="profile-section">
                    <div class="section-header">
                        <h3>Notification Settings</h3>
                        <p>Manage how you receive notifications</p>
                    </div>
                    
                    <div class="notification-preferences">
                        <div class="notification-group">
                            <h4>Email Notifications</h4>
                            
                            <div class="notification-option">
                                <div class="notification-info">
                                    <h5>Weekly Reports</h5>
                                    <p>Receive weekly performance reports via email</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            
                            <div class="notification-option">
                                <div class="notification-info">
                                    <h5>Low Inventory Alerts</h5>
                                    <p>Get notifications when inventory items are running low</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            
                            <div class="notification-option">
                                <div class="notification-info">
                                    <h5>Order Updates</h5>
                                    <p>Receive notifications when orders change status</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="notification-group">
                            <h4>System Notifications</h4>
                            
                            <div class="notification-option">
                                <div class="notification-info">
                                    <h5>Dashboard Alerts</h5>
                                    <p>Show real-time notifications on dashboard</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                            
                            <div class="notification-option">
                                <div class="notification-info">
                                    <h5>Sales Targets</h5>
                                    <p>Get notified when sales targets are reached</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox">
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    <polyline points="7 3 7 8 15 8"></polyline>
                                </svg>
                                Save Preferences
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Activity Log Section -->
                <div id="activity" class="profile-section">
                    <div class="section-header">
                        <h3>Activity Log</h3>
                        <p>View your recent account activity</p>
                    </div>
                    
                    <div class="activity-log">
                        <div class="activity-filters">
                            <div class="filter-group">
                                <label for="activity-type">Activity Type</label>
                                <select id="activity-type">
                                    <option value="all">All Activities</option>
                                    <option value="login">Login Events</option>
                                    <option value="order">Order Actions</option>
                                    <option value="report">Report Generation</option>
                                </select>
                            </div>
                            
                            <div class="filter-group">
                                <label for="activity-date">Date Range</label>
                                <select id="activity-date">
                                    <option value="7">Last 7 Days</option>
                                    <option value="30">Last 30 Days</option>
                                    <option value="90">Last 90 Days</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="activity-timeline">
                            <div class="activity-item">
                                <div class="activity-icon login">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                        <polyline points="10 17 15 12 10 7"></polyline>
                                        <line x1="15" y1="12" x2="3" y2="12"></line>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-header">
                                        <h5>Account Login</h5>
                                        <span class="activity-time">Today, 09:42 AM</span>
                                    </div>
                                    <p>Successfully logged in from Chrome on Windows</p>
                                </div>
                            </div>
                            
                            <div class="activity-item">
                                <div class="activity-icon report">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-header">
                                        <h5>Report Generated</h5>
                                        <span class="activity-time">Today, 08:15 AM</span>
                                    </div>
                                    <p>Sales performance report for May 2025</p>
                                </div>
                            </div>
                            
                            <div class="activity-item">
                                <div class="activity-icon order">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-header">
                                        <h5>Order Updated</h5>
                                        <span class="activity-time">Yesterday, 16:30 PM</span>
                                    </div>
                                    <p>Changed status of order #ORD-2120 to "Ready"</p>
                                </div>
                            </div>
                            
                            <div class="activity-item">
                                <div class="activity-icon login">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                        <polyline points="10 17 15 12 10 7"></polyline>
                                        <line x1="15" y1="12" x2="3" y2="12"></line>
                                    </svg>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-header">
                                        <h5>Account Login</h5>
                                        <span class="activity-time">Yesterday, 08:30 AM</span>
                                    </div>
                                    <p>Successfully logged in from Safari on macOS</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="activity-actions">
                            <button class="btn-text">Load More</button>
                            <button class="btn-text">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                                Clear Log
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Avatar Upload Modal -->
    <div id="avatar-upload-modal" class="modal hidden">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Update Profile Picture</h4>
                <button type="button" class="modal-close" onclick="document.getElementById('avatar-upload-modal').classList.add('hidden')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.avatar.update') }}" method="POST" enctype="multipart/form-data" class="avatar-form">
                    @csrf
                    @method('POST')
                    
                    <div class="avatar-preview">
                        <div class="current-avatar">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" id="avatar-preview-img" />
                            @else
                                <div class="avatar-placeholder" id="avatar-preview-placeholder">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <img src="" alt="{{ $user->name }}" id="avatar-preview-img" class="hidden" />
                            @endif
                        </div>
                    </div>
                    
                    <div class="file-upload-container">
                        <label for="avatar" class="file-upload-label">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Choose File
                        </label>
                        <input type="file" id="avatar" name="avatar" accept="image/*" class="file-upload-input" onchange="previewAvatar(this);">
                        <span class="file-name">No file chosen</span>
                    </div>
                    
                    @error('avatar')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-actions">
                        <button type="submit" class="btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"></path>
                                <polyline points="17 8 12 3 7 8"></polyline>
                                <line x1="12" y1="3" x2="12" y2="15"></line>
                            </svg>
                            Upload
                        </button>
                        <button type="button" class="btn-secondary" onclick="document.getElementById('avatar-upload-modal').classList.add('hidden')">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- JavaScript for Profile Page -->
    <script>
        // Function to preview avatar image
        function previewAvatar(input) {
            const previewImg = document.getElementById('avatar-preview-img');
            const previewPlaceholder = document.getElementById('avatar-preview-placeholder');
            const fileName = document.querySelector('.file-name');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('hidden');
                    if (previewPlaceholder) {
                        previewPlaceholder.classList.add('hidden');
                    }
                }
                
                reader.readAsDataURL(input.files[0]);
                fileName.textContent = input.files[0].name;
            }
        }
        
        // Tab navigation
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.profile-nav a');
            const sections = document.querySelectorAll('.profile-section');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links and sections
                    navLinks.forEach(l => l.classList.remove('active'));
                    sections.forEach(s => s.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Show the corresponding section
                    const targetId = this.getAttribute('href').substring(1);
                    document.getElementById(targetId).classList.add('active');
                    
                    // Add animation class to the section
                    const targetSection = document.getElementById(targetId);
                    targetSection.classList.add('section-animate');
                    setTimeout(() => {
                        targetSection.classList.remove('section-animate');
                    }, 500);
                });
            });
            
            // Auto-hide status message after 5 seconds
            const statusMessage = document.querySelector('.status-message');
            if (statusMessage) {
                setTimeout(() => {
                    statusMessage.classList.add('status-hide');
                    setTimeout(() => {
                        statusMessage.remove();
                    }, 500);
                }, 5000);
            }
        });
    </script>
@endsection