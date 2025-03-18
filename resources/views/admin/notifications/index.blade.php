{{-- resources/views/notifications/index.blade.php --}}

@extends('admin.layout')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <div class="admin-container">
        <div class="content-wrapper">
            <div class="page-header">
                <h2>Notifications</h2>
            </div>
            <div class="notifications-wrapper">
                <div class="notification-card unread">
                    <div class="notification-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="notification-content">
                        <h4>New User Registered</h4>
                        <p>A new user has registered on your platform.</p>
                        <span class="notification-time">Just now</span>
                    </div>
                    <div class="notification-actions">
                        <button class="btn mark-read">Mark as Read</button>
                        <button class="btn delete">Delete</button>
                    </div>
                </div>
                <div class="notification-card">
                    <div class="notification-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="notification-content">
                        <h4>Subscription Renewed</h4>
                        <p>A user has renewed their subscription.</p>
                        <span class="notification-time">1 hour ago</span>
                    </div>
                    <div class="notification-actions">
                        <button class="btn mark-read">Mark as Read</button>
                        <button class="btn delete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* public/css/notifications.css */

        .admin-container {
            padding: 20px;
        }

        .content-wrapper {
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            /* box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); */
        }

        .page-header h2 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        h4 {
            border: none;
        }

        -wrapper.notifications {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .notification-card {
            display: flex;
            align-items: flex-start;
            /* Align items to the start */
            /* background: #f9f9f9; */
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            justify-content: space-between;
        }

        .notification-card.unread {
            background: #eaf2ff;
        }

        .notification-icon {
            font-size: 20px;
            margin-top: 23px;
            color: #24007a;
            margin-right: 10px;
        }

        .notification-content {
            flex-grow: 1;
        }

        .notification-time {
            font-size: 12px;
            color: #777;
        }

        .notification-actions {
            display: flex;
            gap: 10px;
            margin-top: 50px;
        }

        .btn {
            padding: 8px 12px;
            font-size: 14px;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: all 0.3s ease-in-out;
        }

        .mark-read {
            background-color: #28a745;
        }

        .delete {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.8;
        }

        @media (max-width: 768px) {
            .notification-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .notification-actions {
                margin-top: 10px;
            }
        }
    </style>
@endsection
