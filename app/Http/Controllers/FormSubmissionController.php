<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\ProjectRequest;
use App\Models\NewsletterSubscriber;
use App\Mail\AdminNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class FormSubmissionController extends Controller
{
    /**
     * Handle contact form submissions.
     */
    public function submitContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 422);
        }

        try {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'message' => $request->input('message'),
            ];

            ContactMessage::create($data);

            // Queue admin email notification
            Mail::to('hello@elvora.com')->send(new AdminNotificationMail('contact', $data));

            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! Our team will get back to you shortly.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving your message. Please try again later.'
            ], 500);
        }
    }

    /**
     * Handle project request submissions.
     */
    public function submitProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'organization' => 'nullable|string|max:255',
            'project_type' => 'required|string|max:255',
            'budget_range' => 'required|string|max:255',
            'timeline' => 'required|string|max:255',
            'description' => 'required|string|max:10000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 422);
        }

        try {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'organization' => $request->input('organization'),
                'project_type' => $request->input('project_type'),
                'budget_range' => $request->input('budget_range'),
                'timeline' => $request->input('timeline'),
                'description' => $request->input('description'),
            ];

            ProjectRequest::create($data);

            // Queue admin email notification
            Mail::to('hello@elvora.com')->send(new AdminNotificationMail('project', $data));

            return response()->json([
                'success' => true,
                'message' => 'Your project request has been submitted successfully! We will schedule a consultation review within 4 business hours.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your request. Please try again later.'
            ], 500);
        }
    }

    /**
     * Handle newsletter subscription submissions.
     */
    public function submitNewsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:newsletter_subscribers,email',
        ], [
            'email.unique' => 'This email is already subscribed to our executive letter.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 422);
        }

        try {
            NewsletterSubscriber::create([
                'email' => $request->input('email')
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Subscription successful! Welcome to the Executive Blog Letter.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving your subscription. Please try again later.'
            ], 500);
        }
    }
}
