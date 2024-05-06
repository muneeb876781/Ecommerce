 <div class="cart">
     <div class="container-fluid">

         <div style="margin-top: 20px" class="row">
             <aside class="col-lg-9">
                 <div class="card">
                     <div class="table-responsive">

                         <table class="table table-borderless table-shopping-cart">
                             <thead class="text-muted">
                                 <tr class="small text-uppercase">
                                     <th scope="col">Product</th>
                                     <th scope="col">Quantity</th>
                                     <th scope="col">Price</th>
                                     <th scope="col">Actions</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @if ($cart->isNotEmpty())
                                     @foreach ($cart as $item)
                                         <tr>
                                             <td>
                                                 <figure class="itemside align-items-center">
                                                     <div class="aside"> <a
                                                             href="{{ route('singleProduct', ['id' => $item->product->id]) }}">

                                                             @if ($item->product->image_url)
                                                                 <img src="{{ asset('storage/uploads/' . $item->product->image_url) }}"
                                                                     class="book-img">
                                                             @elseif (!$item->product->image_url && $item->product->remote_image_url)
                                                                 <img src="{{ $item->product->remote_image_url }}"
                                                                     class="book-img">
                                                             @else
                                                                 <span>No image available</span>
                                                             @endif
                                                         </a></div>
                                                     <figcaption class="info"> <a href="#"
                                                             class="title text-dark" data-abc="true">
                                                             <h6 class="mob-text">
                                                                 {{ implode(' ', array_slice(explode(' ', $item->product->name), 0, 6)) }}
                                                                 @if (str_word_count($item->product->name) > 10)
                                                                     ...
                                                                 @endif
                                                             </h6>
                                                         </a>
                                                         <p class="text-muted small">
                                                             {{ $item->product->category->name }}
                                                         </p>
                                                     </figcaption>
                                                 </figure>
                                             </td>
                                             <td>

                                                 <div class="">
                                                     <button wire:click="decreaseQuantity({{ $item->id }})"
                                                         class="inc-btns">-</button>
                                                     <span class="quantity">{{ $item->quantity }}</span>
                                                     <button wire:click="increaseQuantity({{ $item->id }})"
                                                         class="inc-btns">+</button>
                                                 </div>

                                                 <style>
                                                     .form-control {
                                                         display: flex;
                                                         justify-content: space-between;
                                                         align-items: center;
                                                         padding: 5px 10px;
                                                         border-radius: 20px;
                                                         background-color: #f8f9fa;
                                                         width: 80px;
                                                         /* Adjust width as needed */
                                                     }

                                                     .inc-btns {
                                                         width: 30px;
                                                         height: 30px;
                                                         font-size: 16px;
                                                         font-weight: bold;
                                                         border-radius: 100px;
                                                         background: transparent;
                                                         border: 1px solid black;
                                                     }

                                                     .quantity {
                                                         font-size: 16px;
                                                         font-weight: bold;
                                                         padding: 0 5px;
                                                     }

                                                     @media (max-width: 760px) {
                                                         .form-control {
                                                             width: 60px;
                                                         }

                                                         .inc-btns {
                                                             font-size: 14px;
                                                         }
                                                     }

                                                     @media (max-width: 400px) {
                                                         .form-control {
                                                             width: 50px;
                                                         }
                                                     }
                                                 </style>


                                             </td>
                                             <td>
                                                 <div class="price-wrap">
                                                     <var class="price">AED
                                                         @if ($item->product->discountedPrice)
                                                             {{ $item->product->discountedPrice * $item->quantity }}
                                                         @else
                                                             {{ $item->product->price * $item->quantity }}
                                                         @endif
                                                     </var>
                                                     @if ($item->quantity > 1)
                                                         <small class="text-muted"> AED @if ($item->product->discountedPrice)
                                                                 {{ $item->product->discountedPrice }}
                                                             @else
                                                                 {{ $item->product->price }}
                                                             @endif
                                                             each </small>
                                                     @endif
                                                 </div>

                                             </td>
                                             <td class="text-right  d-md-block">
                                                 {{-- <a style="background: transparent; color:black;"
                                                     data-original-title="Save to Wishlist" title=""
                                                     href="" class="btn btn-light" data-toggle="tooltip"
                                                     data-abc="true"> <i class="fa fa-heart"></i></a> --}}

                                                 {{-- <form style="display: inline;"
                                                     action="{{ route('remove', ['id' => $item->id]) }}" method="POST">
                                                     @csrf
                                                     <button style="background: #cd3301; color: #fff;" type="submit"
                                                         class="btn btn-light">Remove</button>
                                                 </form> --}}
                                                 <button style="background: #cd3301; color: #fff;" class="btn btn-light"
                                                     wire:click="removeItem({{ $item->id }})">Remove</button>

                                             </td>

                                         </tr>
                                     @endforeach
                                 @else
                                     <tr>
                                         <td colspan="4">Your cart is empty.</td>
                                     </tr>
                                 @endif

                             </tbody>
                         </table>
                     </div>
                 </div>
             </aside>
             <aside class="col-lg-3">
                 <div class="card mb-3">
                     <div class="card-body">
                         <form>
                             <div class="form-group"> <label>Have coupon?</label>
                                 <div class="input-group"> <input type="text" class="form-control coupon"
                                         name="" placeholder="Coupon code"> <span class="input-group-append">
                                         <button class="btn btn-primary btn-apply coupon">Apply</button> </span>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>

                 <div class="card">
                     <div class="card-body">
                         <dl class="dlist-align">
                             <dt>Total price:</dt>
                             <dd id="totalPrice" class="text-right ml-3">AED {{ $totalPrice }}</dd>
                         </dl>
                         <dl class="dlist-align">
                             <dt>Discount:</dt>
                             <dd id="discount" class="text-right text-danger ml-3">- AED 0</dd>
                         </dl>
                         <dl class="dlist-align">
                             <dt>Total:</dt>
                             <dd id="finalTotal" class="text-right text-dark b ml-3"><strong>AED
                                     {{ $totalPrice }}</strong></dd>
                         </dl>

                         <hr> <a style="background: #cd3301;color: #fff;" href="{{ route('checkout') }}"
                             class="btn btn-main" data-abc="true">
                             Make Purchase </a>
                         <a style="background: #cd3301;color: #fff;" href="{{ route('shop') }}"
                             class="btn btn-main mt-2" data-abc="true">Continue
                             Shopping</a>
                     </div>
                 </div>
             </aside>
         </div>
     </div>
 </div>
 {{-- <script>
     document.addEventListener('DOMContentLoaded', function() {
         let totalPrice = 0;
         let discount = 0; 
         let finalTotal = 0;

         @foreach ($cart as $item)
             @if ($item->product->discountedPrice)
                 totalPrice += {{ $item->product->discountedPrice }} * {{ $item->quantity }};
             @else
                 totalPrice += {{ $item->product->price }} * {{ $item->quantity }};
             @endif
         @endforeach

         finalTotal = totalPrice - discount;

         document.getElementById('totalPrice').innerText = `AED ${totalPrice.toFixed(2)}`;
         document.getElementById('discount').innerText = `- AED ${discount.toFixed(2)}`;
         document.getElementById('finalTotal').innerText = `AED ${finalTotal.toFixed(2)}`;
     });
 </script> --}}
