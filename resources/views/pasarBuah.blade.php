<div>
    <ol>
        @forelse ($pasarBuah as $val)
            <li>{{ $val }}</li>
        @empty
            <div>Data tidak ada</div>
        @endforelse
    </ol>
</div>
