"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const cluster = require("cluster");
const os_1 = require("os");
class Clusters {
    constructor() {
        this.cpus = os_1.cpus();
        this.init();
    }
    init() {
        if (cluster.isMaster) {
            this.cpus.forEach(() => cluster.fork());
            cluster.on('listening', (worker) => {
                console.log('Cluster %d connected', worker.process.pid);
            });
            cluster.on('disconnect', (worker) => {
                console.log('Cluster %d disconnected', worker.process.pid);
            });
            cluster.on('exit', (worker) => {
                console.log('Cluster %d exited', worker.process.pid);
                cluster.fork();
            });
        }
        else {
            require('./server');
        }
    }
}
exports.default = new Clusters();
