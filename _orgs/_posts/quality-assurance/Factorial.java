public class Factorial {

    public static void main(String[] args) {
        System.out.print("success");
    }

    public static long fact(long n) {
        long r = 1;
        for (long i = 1; i <= n; i++) {
            r = r * i;
        }
        return r;
    }
}