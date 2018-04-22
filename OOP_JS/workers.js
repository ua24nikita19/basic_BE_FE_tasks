var totalSalary = 0;

function Worker(name,surname,rate,days){

    this.name = name;
    this.surname = surname;
    this.rate = rate;
    this.days = days;

    this.getSalary = function () {
        return this.rate*this.days;
    };

    getTotalSalary(this.getSalary());
}

function getTotalSalary(val) {
    totalSalary+=val;
}

function Director() {

    this.addWorker = function (name,surname,rate,days) {
        return Worker.prototype.constructor(name,surname,rate,days);
    };

    this.remoweWorker = function (name) {
        return delete Worker.name;
    };
    
    this.getWorker = function (name) {
        return this.name;
    };

    this.setWorkerRate = function (name,rate) {
        if(name in this){

        }
    }
}

Director.prototype = Object.create(Worker.prototype);

var director = new Director;
director.addWorker('asd','asd',3,45);