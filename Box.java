import java.util.ArrayList;

class Box {
    ArrayList<Thing> contents = new ArrayList<>();

    public void add(Thing truc) {
        this.contents.add(truc);
    }

    public boolean contains(Thing truc) {
        return this.contents.contains(truc);
    }

    public void remove(Thing truc) throws Exception {
        if (!this.contents.contains(truc)) {
            throw new Exception("ca n'existe pas");
        }
        this.contents.remove(truc);
    }
}