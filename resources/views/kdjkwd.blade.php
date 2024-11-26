<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Subcategory 1 -->
    <div class="bg-white rounded-lg shadow-lg p-6">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Appetizers</h2>
      <ul class="space-y-4">
        <!-- Item 1 -->
        <li>
          <p class="text-gray-600 font-medium">Spring Rolls</p>
          <p class="text-sm text-gray-500 italic truncate-description" data-full-text="A delicious mix of vegetables and spices wrapped in thin pastry, fried to perfection.">
            A delicious mix of vegetables and spices wrapped in thin pastry...
            <a href="#" class="text-blue-600 expand-description">Read More</a>
          </p>
          <span class="block mt-2 text-lg font-bold text-green-600">$6.99</span>
        </li>

      </ul>
    </div>

</div>


/////



<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">



@foreach ( $subcategories as $subcategorie )
<div class="bg-white rounded-lg shadow-lg p-6">
  <h2 class="text-xl font-semibold text-gray-800 mb-4">{{$subcategorie->name}}</h2>






  @foreach($subcategorie->items as $subs)
  <ul class="space-y-4">
    <!-- Item 1 -->
    <li>
      <p class="text-gray-600 font-medium">{{$subs->name}}</p>
      <p class="text-sm text-gray-500 italic truncate-description" data-full-text="A delicious mix of vegetables and spices wrapped in thin pastry, fried to perfection.">
        {{$subs->description}}
        <a href="#" class="text-blue-600 expand-description">Read More</a>
      </p>
      <span class="block mt-2 text-lg font-bold text-green-600">{{$subs->price}}</span>
    </li>

  </ul>
  @endforeach 
@endforeach


</div>
</div>