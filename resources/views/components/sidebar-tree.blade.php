<ul class="a-sidebar-tree level-{{ $level }}" x-collapse x-show="<?= $level === 1 ? true : 'expanded' ?>">
    @foreach ($items as $index => $item)
        <li class="a-sidebar-item" :key="{{ $level }}-{{ $index }}" x-data="{expanded: {{ $item['expanded'] ? 'true' : 'false' }}}">
            <a
                href="{{ $item['href'] ?? 'javascript:void(0)' }}"
                x-data
                @class([
                    'expanded' => $item['expanded'],
                    'active' => $item['active'],
                ])
                @@click="expanded = !expanded"
            >
                <span class="flex-grow-1">{{ $item['label'] }}</span>
                @if (isset($item['children']))
                    <div
                        @class([
                            'transition-all',
                            'i-mdi:chevron-down',
                            'transform-rotate-180' => $item['expanded']
                        ])
                        :class="{
                            'transform-rotate-180': expanded,
                        }"
                    ></div>
                @endif
            </a>
            @if (isset($item['children']))
                <x-sidebar-tree :items="$item['children']" :level="$level + 1" />
            @endif
        </li>
    @endforeach
</ul>