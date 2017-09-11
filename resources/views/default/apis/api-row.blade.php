<tr>
    <td>{{ $api['name']  }}</td>
    <td>{{ $api['upstream_url'] }}</td>
    <td>{{ implode(',',$api['uris'])  }}</td>
    <td>{{ $api['https_only'] ? 'Yes' : 'No'  }}</td>
    <td>{{ date('Y-m-d H:i:s', $api['created_at'])  }}</td>
    <td>
        <a href="{{ url('/apis', [$api['id'],'edit'], env('HTTPS_ONLY'))  }}?api={{ base64_encode(json_encode($api)) }}"
           class="btn btn-default">
            <i class="glyphicon glyphicon-pencil"></i> Edit
        </a>
    </td>
</tr>