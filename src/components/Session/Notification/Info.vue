<script>
    export default{
        props: [ 'result' ]
    }
</script>

<template>
    <div class="session-history-container">
        <div class="session-record-container"  v-for="info in result">
            <div class=" text-right session-history-date">{{ info.created_at }}</div>
            <div class="session-history-details">
                <span v-if="info.status == 'Received'">
                    Your order of {{ info.main_order }} <span v-if="info.additional_order">and {{ info.additional_order }}</span> created at {{ info.created_at }} has been received.
                </span>
                <span v-if="info.status == 'Completed'">
                    Thank you for your patronage. Your order of {{ info.main_order }} <span v-if="info.additional_order">and {{ info.additional_order }}</span> has been completed and was delivered successfully. Please feel free to message us for suggestion or complaints via our customer care at the bottom right of the screen.
                </span>
                <span v-if="info.status == 'Canceled'">
                    Your order of {{ info.main_order }} <span v-if="info.additional_order">and {{ info.additional_order }} has been canceled by you.</span>
                </span>
            </div>
        </div>
    </div>
</template>