class LeaveApplicationHelper
{
    static applyDateMustBeFireDaysBefore() {
        let dateNow = moment();
        console.log(dateNow);
    }
    

    static isPointsInsufficient(period_days, earned_points) {
        return parseFloat(period_days) > parseFloat(earned_points);
    }

    static points(period_days, earned_points) {
        return new Promise((resolve, reject) => {
            if (this.isPointsInsufficient(period_days, earned_points)) {
                reject({
                    message : 'Insufficient Earned points.',
                    earned_points,
                    period_days
                });  
            }

            resolve({
                    earned_points,
                    period_days
            });
            
        });
    }
}