<script>
    export default{
        props: [ 'result' ]
    }
</script>

<template>
    <div class="session-history-container">
        <div class="session-record-container" v-for="record in result" v-motion-slide-visible-left>
            <div class="session-history-date-container">
                <div class="session-history-date"> {{ record.created_at }} </div>
                <div class="session-history-progress">Order {{ record.status }}</div>
            </div>
            <div class="session-history-details">
                <span v-if="record.status == 'Received'">
                    Your order of {{ record.main_order }} <span v-if="record.additional_order">and {{ record.additional_order }}</span> has been received and the estimated time of arrival is {{ record.arrival }} to be delivered at {{ record.street_address }}, {{ record.city }}, {{ record.state }}.
                </span>
                <span v-if="record.status == 'Canceled'">
                    You canceled your order of {{ record.main_order }} <span v-if="record.additional_order">and {{ record.additional_order }}</span>
                </span>
                <span v-if="record.status == 'Completed'">
                    Your order of {{ record.main_order }} <span v-if="record.additional_order">and {{ record.additional_order }}</span> has been completed and was delivered to {{ record.street_address }}, {{ record.city }}, {{ record.state }}.
                </span>
            </div>
        </div>
    </div>
</template>