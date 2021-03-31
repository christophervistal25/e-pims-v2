<template>
    <div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 p-2">
                    GOVERTMENT ISSUED ID
                </h5>
            </div>

            <div class="collapse show">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr class="text-center text-sm" style="background: #EAEAEA;">
                            <td>Government Issued ID</td>
                            <td>ID/License/Passport No.</td>
                            <td>Date/Place of Issuance</td>
                        </tr>

                        <tbody id="dynamic-row-references-data">
                            <tr>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        name="governmentId.nameOfGovId"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        name="governmentId.idNo"
                                    />
                                </td>
                                <td>
                                    <input
                                        type="text"
                                        class="form-control rounded-0 border-0"
                                        placeholder=""
                                        name="governmentId.dateOfIssuance"
                                    />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            governmentId: {
                nameOfGovId: "",
                idNo: "",
                dateOfIssuance: ""
            }
        };
    },
    methods: {}
};
</script>

<style></style>
