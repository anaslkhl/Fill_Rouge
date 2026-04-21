<?php


namespace App\Exports;

use App\Models\CallLog;
use App\Models\CallLogs;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Http\Request;

class AgentCallsExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $userId;
    protected $startDate;
    protected $endDate;

    public function __construct($userId, $startDate, $endDate)
    {
        $this->userId = $userId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        return CallLogs::with(['client', 'feedback'])
            ->where('user_id', $this->userId)
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->orderBy('created_at', 'desc');
    }

    public function headings(): array
    {
        return [
            'Call ID',
            'Client Name',
            'Client Phone',
            'Issue',
            'Date & Time',
            'Duration (sec)',
            'Result',
            'Status',
            'Feedback',
            'Rating',
        ];
    }

    public function map($call): array
    {
        return [
            $call->id,
            $call->client->name ?? 'N/A',
            $call->client->phone ?? 'N/A',
            $call->client->issue ?? 'N/A',
            $call->created_at,
            $call->duration ?? 0,
            $call->result ?? 'N/A',
            $call->status ?? 'N/A',
            $call->feedback->feedback ?? 'No feedback',
            $call->feedback->rating ?? 'N/A',
        ];
    }
}