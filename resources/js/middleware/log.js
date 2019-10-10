export default function log({ next, to }) {
    console.log(`Name: ${to.name} Path: ${to.path}`);
    return next();
}
