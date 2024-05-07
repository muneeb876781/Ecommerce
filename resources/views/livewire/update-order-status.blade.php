<div class="col-md-4">
    <span style="color: black">
        <strong>Order Status: </strong>
        {{ $order->order_status }}
    </span>
    <div class="input-group mb-2">

        <select class="form-select form-control-lg" name="status" wire:model="selectedStatus"
            aria-label="Update Order Status">
            <option value="Pending">Pending</option>
            <option value="Accepted">Accepted</option>
            <option value="Completed">Completed</option>
            <option value="Rejected">Rejected</option>
            <option value="Dispatched">Dispatched</option>
            <option value="Returned">Returned</option>
        </select>
        <button wire:click="updateStatus" class="btn btn-primary" type="button">Update Status</button>
    </div>
</div>
