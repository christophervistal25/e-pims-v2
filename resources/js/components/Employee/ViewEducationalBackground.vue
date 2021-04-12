<template>
  <div>
    <div v-if="employee.hasOwnProperty('educational_background')">
       <p>   elementary_name : {{ employee.educational_background.  elementary_name }} </p>
      <p>   elementary_education : {{ employee.educational_background.  elementary_education }} </p>
      <p>   elementary_period_from : {{ employee.educational_background.  elementary_period_from }} </p>
      <p>   elementary_period_to : {{ employee.educational_background.  elementary_period_to }} </p>
      <p>   elementary_highest_level_units_earned : {{ employee.educational_background.  elementary_highest_level_units_earned }} </p>
      <p>   elementary_year_graduated : {{ employee.educational_background.  elementary_year_graduated }} </p>
      <p>   elementary_scholarship : {{ employee.educational_background.  elementary_scholarship }} </p>
      <p>   secondary_name : {{ employee.educational_background.  secondary_name }} </p>
      <p>   secondary_education : {{ employee.educational_background.  secondary_education }} </p>
      <p>   secondary_period_from : {{ employee.educational_background.  secondary_period_from }} </p>
      <p>   secondary_period_to : {{ employee.educational_background.  secondary_period_to }} </p>
      <p>   secondary_highest_level_units_earned : {{ employee.educational_background.  secondary_highest_level_units_earned }} </p>
      <p>   secondary_year_graduated : {{ employee.educational_background.  secondary_year_graduated }} </p>
      <p>   secondary_scholarship : {{ employee.educational_background.  secondary_scholarship }} </p>
      <p>   vocational_trade_course_name : {{ employee.educational_background.  vocational_trade_course_name }} </p>
      <p>   vocational_education : {{ employee.educational_background.  vocational_education }} </p>
      <p>   vocational_trade_course_period_from : {{ employee.educational_background.  vocational_trade_course_period_from }} </p>
      <p>   vocational_trade_course_period_to : {{ employee.educational_background.  vocational_trade_course_period_to }} </p>
      <p>   vocational_trade_course_highest_level_units_earned : {{ employee.educational_background.  vocational_trade_course_highest_level_units_earned }} </p>
      <p>   vocational_trade_course_year_graduated : {{ employee.educational_background.  vocational_trade_course_year_graduated }} </p>
      <p>   vocational_trade_course_scholarship : {{ employee.educational_background.  vocational_trade_course_scholarship }} </p>
      <p>   college_name : {{ employee.educational_background.  college_name }} </p>
      <p>   college_education : {{ employee.educational_background.  college_education }} </p>
      <p>   college_period_from : {{ employee.educational_background.  college_period_from }} </p>
      <p>   college_period_to : {{ employee.educational_background.  college_period_to }} </p>
      <p>   college_highest_level_units_earned : {{ employee.educational_background.  college_highest_level_units_earned }} </p>
      <p>   college_year_graduated : {{ employee.educational_background.  college_year_graduated }} </p>
      <p>   college_scholarship : {{ employee.educational_background.  college_scholarship }} </p>
      <p>   graduate_studies_name : {{ employee.educational_background.  graduate_studies_name }} </p>
      <p>   graduate_studies_education : {{ employee.educational_background.  graduate_studies_education }} </p>
      <p>   graduate_studies_period_from : {{ employee.educational_background.  graduate_studies_period_from }} </p>
      <p>   graduate_studies_period_to : {{ employee.educational_background.  graduate_studies_period_to }} </p>
      <p>   graduate_studies_highest_level_units_earned : {{ employee.educational_background.  graduate_studies_highest_level_units_earned }} </p>
      <p>   graduate_studies_year_graduated : {{ employee.educational_background.  graduate_studies_year_graduated }} </p>
      <p>   graduate_studies_scholarship : {{ employee.educational_background.  graduate_studies_scholarship }} </p>
  
    </div>
  </div>
</template>

<script>
export default {
  props  : {
    employee : {
      required :true,
    }
  },
}
</script>

<style>

</style>