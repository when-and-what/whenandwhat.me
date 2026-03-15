<?php

namespace App\Livewire;

use Livewire\Component;

class AccordionFaq extends Component
{
    public array $items = [
        [
            'question' => 'What is When and What?',
            'answer'   => 'When and What is a personal activity tracking service that pulls together your watch history, workouts, music, and location check-ins into a single daily summary. Connect your existing services and see everything that happened on any given day.',
        ],
        [
            'question' => 'Which services can I connect?',
            'answer'   => 'Currently you can connect Trakt (movies and TV), Strava (workouts and activities), and ListenBrainz (music listening history). You can also add manual location check-ins. More integrations are planned.',
        ],
        [
            'question' => 'Is my data private?',
            'answer'   => 'Yes. Your activity data is private by default and is only visible to you. We do not share or sell your data. See our Privacy Policy for full details.',
        ],
        [
            'question' => 'How often is data synced from connected services?',
            'answer'   => 'Data is synced automatically on a regular schedule. Most integrations update at least once per day. You can also trigger a manual sync from your account settings.',
        ],
        [
            'question' => 'Can I delete my account and data?',
            'answer'   => 'Yes. You can delete your account at any time from your account settings. All personal data and imported activity data will be permanently deleted within 30 days of your request.',
        ],
        [
            'question' => 'Does When and What post anything to my connected accounts?',
            'answer'   => 'No. When and What only reads data from Trakt, Strava, and ListenBrainz. We never post, update, or delete anything on those platforms on your behalf.',
        ],
        [
            'question' => 'How do I add a check-in?',
            'answer'   => 'Open the app at whenandwhat.app and use the Check In button to log your current location or any place you\'ve visited. You can add a name, and optionally pin it on the map.',
        ],
        [
            'question' => 'Can I look back at old days?',
            'answer'   => 'Yes. Use the calendar or date picker in the app to navigate to any past day and see everything that was logged for it — as far back as your connected services have data.',
        ],
    ];

    public function render(): \Illuminate\View\View
    {
        return view('livewire.accordion-faq');
    }
}
