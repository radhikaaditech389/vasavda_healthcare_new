@foreach ($sliders as $slider)
    <tr>
        <td>{{ $slider->id }}</td>
        <td>
            @if($slider->image)
                <img src="{{ asset($slider->image) }}" width="100">
            @elseif($slider->video)
                <video width="100" controls>
                    <source src="{{ asset($slider->video) }}" type="video/mp4">
                </video>
            @endif
        </td>
        <td>{{ $slider->title1 }}</td>
        <td>{{ $slider->title2 }}</td>
        <td>{{ $slider->title3 }}</td>
        <td>{{ $slider->sequence }}</td>
        <td>
            <a href="#" 
               class="btn btn-primary btn-round edit-slider"
               data-id="{{ $slider->id }}"
               data-sequence="{{ $slider->sequence }}"
               data-image="{{ $slider->image ? asset($slider->image) : '' }}"
               data-video="{{ $slider->video ? asset($slider->video) : '' }}"
               data-media-type="{{ $slider->image ? 'image' : ($slider->video ? 'video' : '') }}"
               data-title1="{{ $slider->title1 }}"
               data-title2="{{ $slider->title2 }}"
               data-title3="{{ $slider->title3 }}"
            >Edit</a>
            <a href="#" class="btn btn-danger btn-round delete-slider" data-id="{{ $slider->id }}">Delete</a>
        </td>
    </tr>
@endforeach