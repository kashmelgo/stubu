<a href="{{route('deletenotif', [
    'thread'=>$notification->data['thread']['id'],
    'id'=>$notification->id])
    }}">
    {{$notification->data['user']['name']}} replied to your Thread<strong> {{$notification->data['thread']['subject']}} <strong>
</a>
