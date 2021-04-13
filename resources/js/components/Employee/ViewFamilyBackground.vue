<template>
    <div>
        <div v-if="employee.hasOwnProperty('family_background')">
            <p>
                spouse_firstname :
                {{ employee.family_background.spouse_firstname }}
            </p>
            <p>
                spouse_lastname :
                {{ employee.family_background.spouse_lastname }}
            </p>
            <p>
                spouse_middlename :
                {{ employee.family_background.spouse_middlename }}
            </p>
            <p>
                spouse_extension :
                {{ employee.family_background.spouse_extension }}
            </p>
            <p>
                spouse_occupation :
                {{ employee.family_background.spouse_occupation }}
            </p>
            <p>
                spouse_employer_business_name :
                {{ employee.family_background.spouse_employer_business_name }}
            </p>
            <p>
                spouse_business_address :
                {{ employee.family_background.spouse_business_address }}
            </p>
            <p>
                spouse_telephone_number :
                {{ employee.family_background.spouse_telephone_number }}
            </p>
            <p>
                father_firstname :
                {{ employee.family_background.father_firstname }}
            </p>
            <p>
                father_lastname :
                {{ employee.family_background.father_lastname }}
            </p>
            <p>
                father_middlename :
                {{ employee.family_background.father_middlename }}
            </p>
            <p>
                father_extension :
                {{ employee.family_background.father_extension }}
            </p>
            <p>
                mother_maidenname :
                {{ employee.family_background.mother_maidenname }}
            </p>
            <p>
                mother_lastname :
                {{ employee.family_background.mother_lastname }}
            </p>
            <p>
                mother_firstname :
                {{ employee.family_background.mother_firstname }}
            </p>
            <p>
                mother_middlename :
                {{ employee.family_background.mother_middlename }}
            </p>
            <p>
                mother_extension :
                {{ employee.family_background.mother_extension }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        employee: {
            required: true
        }
    }
};
</script>

<style></style>
