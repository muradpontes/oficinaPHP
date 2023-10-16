$(document).ready(function () {
    const totalInput = $('#total');
    const discountInput = $('#discount');
    const originalTotal = parseFloat(totalInput.val());

    function updateTotal() {
        const discountPercentage = parseFloat(discountInput.val());

        if (discountPercentage > 0) {
            const discountAmount = (originalTotal * discountPercentage) / 100;
            const discountedTotal = originalTotal - discountAmount;
            totalInput.val(discountedTotal.toFixed(2));
        } else {
            totalInput.val(originalTotal.toFixed(2));
        }
    }

    discountInput.on('input', updateTotal);
});
