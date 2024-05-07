<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class UpdateOrderStatus extends Component
{
    public $order;
    public $selectedStatus;

    public function mount($orderId)
    {
        $this->order = Order::find($orderId);
        $this->selectedStatus = $this->order->order_status;
    }

    public function updateStatus()
    {
        if (!in_array($this->selectedStatus, ['Pending', 'Accepted', 'Completed', 'Rejected', 'Returned', 'Dispatched'])) {
            return;
        }

        $this->order->order_status = $this->selectedStatus;
        $this->order->save();

        $this->order = Order::find($this->order->id);
    }

    public function render()
    {
        return view('livewire.update-order-status');
    }
}
