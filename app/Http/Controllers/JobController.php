<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Displays the job index page with a list of jobs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    /**
     * Displays the job creation form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Displays the details of a specific job.
     *
     * @param Job $job The job to be displayed
     * @return \Illuminate\View\View
     */
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Handles the creation of a new job.
     *
     * Validates the title and salary fields, creates a new job with the provided data, and redirects to the jobs page.
     *
     * @throws Illuminate\Validation\ValidationException if the validation fails
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        request()->validate([
            'title' => ['required', 'min: 3'],
            'salary' => ['required'],
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        return redirect('/jobs');
    }

    /**
     * Displays the edit job page for a given job.
     *
     * @param Job $job The job to be edited.
     * @return \Illuminate\View\View
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Updates a job with the provided data and redirects to the job's page.
     *
     * @param Job $job The job to be updated.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min: 3'],
            'salary' => ['required'],
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    /**
     * Deletes a job and redirects to the jobs page.
     *
     * @param Job $job The job to be deleted
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}