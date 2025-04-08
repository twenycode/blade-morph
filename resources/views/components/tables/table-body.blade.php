{{--
  Table Body Component

  A simple wrapper for the <tbody> element that allows:
  - Custom attributes to be passed
  - Setting a unique ID for JavaScript targeting
--}}

<tbody {{ $attributes }} id="{{ $id }}">
{{ $slot }}
</tbody>