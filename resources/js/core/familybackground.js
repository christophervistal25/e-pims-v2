import swal from "sweetalert";
import axios from "axios";

const RESPONSE_SUCCESS = 200;
const VALIDATION_FAILED = 422;

const generateSpouse = spouse => {
    spouse.push({
        name: "",
        date_of_birth: ""
    });

    return spouse;
};

const removeGeneratedField = (spouse, index) => {
    return swal({
        title: "Wait a minute",
        text: "Are you sure you want to remove this record?",
        icon: "warning"
    }).then(confirm => {
        if (confirm) {
            spouse.splice(index, 1);
            return true;
        }
        return false;
    });
};

const submit = (data, errors) => {
    return axios
        .post(
            `/api/personal-data-sheet/family-background/update/${data.employee_id}`,
            data
        )
        .then(response => {
            if (response.status === RESPONSE_SUCCESS) {
                swal({
                    title: "",
                    text : "Family background successfully updated",
                    icon: "success",
                    buttons: false,
                    timer: 5000
                });
            }
        })
        .catch(error => {
            if (error.response.status === VALIDATION_FAILED) {
                Object.keys(error.response.data.errors).map(field => {
                    let [fieldMessage] = error.response.data.errors[field];
                    errors[field] = fieldMessage;
                });
                return errors;
            }
        });
};

const fetchUser = id =>
    axios(`/api/personal-data-sheet/family-background/fetch/${id}`).then(
        response => response.data
    );

export default {
    generateSpouse,
    removeGeneratedField,
    submit,
    fetchUser
};
